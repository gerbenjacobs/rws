<?php
class RWS {
	private $url_codes = 'http://www.rws.nl/rws/opendata/lmw-par-codes.csv';
	private $url_locations = 'http://rws.nl/system/externen/meetnet-repository.aspx';
	private $url_current_measurements = 'https://www.rijkswaterstaat.nl/rws/opendata/meetdata/meetdata.zip';
	private $cache_expiration = 600; // 5 minutes
	private $cache_expiration_location = 43200; // 12 hours
	private $zipfile = 'cache/meetdata.zip';
	private $locationfile = 'cache/locations.xml';
	private $zippables;
	private $locationdata;
	
	private $locations;
	private $measurements;
	
	private $fields = array(
		'network',
		'location_code',
		'unknown',
		'sensor_code',
		'location_name',
		'sensor_name',
		'measurement',
		'time_started',
		'time_ended',
		'encoding'
	);
	
	public function __construct() {
		$this->validateCache();
	}
	
	private function validateCache() {
		if (file_exists($this->zipfile)) {
			if ((time() - filemtime($this->zipfile)) > $this->cache_expiration) {
				$this->fetchData($this->zipfile, $this->url_current_measurements);
			}
		} else {
			$this->fetchData($this->zipfile, $this->url_current_measurements);
		}
		
		if (file_exists($this->locationfile)) {
			if ((time() - filemtime($this->locationfile)) > $this->cache_expiration_location) {
				$this->fetchData($this->locationfile, $this->url_locations);
			}
		} else {
			$this->fetchData($this->locationfile, $this->url_locations);
		}
	}
	
	private function fetchData($file, $url) {
		return file_put_contents($file, file_get_contents($url));
	}
	
	private function unzip() {
		$files = zip_open($this->zipfile);
		while ($file = zip_read($files)) {
			if ($filesize = zip_entry_filesize($file)) {
				$filename = zip_entry_name($file);
				$fileext = pathinfo($filename, PATHINFO_EXTENSION);
				$temp = array(
					'filename' => $filename,
					'filesize' => $filesize,
					'data' => zip_entry_read($file, $filesize)
				);
				$this->zippables[$fileext] = $temp;
			}
		}
		return $this->zippables;
	}
	
	private function extractLocationData() {
		$xml = file_get_contents($this->url_locations);
		$xmldata = new SimpleXMLElement($xml, true);
		foreach ($xmldata->waterdata as $location) {
			$this->locationdata[(string) $location->locatie] = (array) $location;
		}
	}
	
	
	private function getLocations() {
		$data = array();
		$lines = explode("\n", $this->zippables['adm']['data']);
		foreach ($lines as $line) {
			if ($line) {
				$data[] = array_map("trim", str_getcsv($line));
			}
		}
		$this->locations = $data;
	}
	
	private function getMeasurements() {
		$data = array();
		$lines = explode("\n", $this->zippables['dat']['data']);
		foreach ($lines as $line) {
			if ($line) {
				$data[] = array_map("trim", str_getcsv($line));
			}
		}
		$this->measurements = $data;
	}
	
	private function stringToTime($string) {
		// Not even strtotime() can handle this.
		return DateTime::createFromFormat('j-M-y G:i+', $string, new DateTimeZone('Europe/Amsterdam'));
	}
	
	private function combineData() {
		// Prettify the location data
		$n = 0;
		$locs = array();
		foreach ($this->locations as $location) {
			$f = 0;
			foreach ($location as $field) {
				$fieldname = $this->fields[$f];
				$locs[$n][$fieldname] = $field;
				$f++;
			}
			$n++;
		}
		
		// Add the measurements
		$data = array();
		foreach ($locs as $line => $object) {
			$time_start = $this->stringToTime($object['time_started']);
			$time_end = $this->stringToTime($object['time_ended']);
			$measurements = array();
			foreach ($this->measurements[$line] as $idx => $measurement) {
				if ($measurement) {
					$time_start->add(new DateInterval('PT10M'));
					$measurements[] = array(
						'time' => $time_start->format('c'),
						'measurement' => $measurement,
						'prediction' => ($idx == 5) ? true : false
					);
				}
			}
			
			// Overwrite time in $object
			$object['time_started'] = $this->stringToTime($object['time_started'])->format('c');
			$object['time_ended'] = $this->stringToTime($object['time_ended'])->format('c');

			$array = array_merge(
				$object, 
				array('measurements' => $measurements)
			);
			if (isset($this->locationdata[$object['location_code']])) {
				$data[] = array_merge($array, array('location' => $this->locationdata[$object['location_code']]));
			} else {
				$data[] = $array;
			}
		}
		
		return $data;
	}
	
	public function getData() {
		// Unzip it
		$this->unzip();
		
		// Extract location data
		$this->extractLocationData();
		
		// Load locations
		$this->getLocations();
		
		// Load measurements
		$this->getMeasurements();
		
		// Combine
		$data = $this->combineData();
		
		// Return
		return $data;
	}
}
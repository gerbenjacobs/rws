<?php

namespace rws\Entities;


class MeasurePoint
{

    //[network] => LMW
    //[location_code] => A122
    //[unknown] =>
    //[sensor_code] => Fp
    //[location_name] => A12 Boei
    //[sensor_name] => Piekfrequentie
    //[measurement] => mHz
    //[time_started] => 2015-06-02T15:00:00+02:00
    //[time_ended] => 2015-06-02T15:50:00+02:00
    //[encoding] => ASCII

    private $network;
    private $location;
    private $sensor;
    private $measurements;
    private $time_started;
    private $time_ended;


    /**
     * @return Measurement[]
     */
    public function getMeasurements()
    {
        return $this->measurements;
    }

    /**
     * @param Measurement[] $measurements
     */
    public function setMeasurements($measurements)
    {
        $this->measurements = $measurements;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return Sensor
     */
    public function getSensor()
    {
        return $this->sensor;
    }

    /**
     * @param Sensor $sensor
     */
    public function setSensor($sensor)
    {
        $this->sensor = $sensor;
    }

    /**
     * @return string
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param string $network
     */
    public function setNetwork($network)
    {
        $this->network = $network;
    }

    /**
     * @return \DateTime
     */
    public function getTimeStarted()
    {
        return $this->time_started;
    }

    /**
     * @param \DateTime $time_started
     */
    public function setTimeStarted($time_started)
    {
        $this->time_started = $time_started;
    }

    /**
     * @return \DateTime
     */
    public function getTimeEnded()
    {
        return $this->time_ended;
    }

    /**
     * @param \DateTime $time_ended
     */
    public function setTimeEnded($time_ended)
    {
        $this->time_ended = $time_ended;
    }
}
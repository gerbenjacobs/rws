<?php

namespace rws\Entities;

class Location
{

    private $id;
    private $name;
    private $lat;
    private $lng;
    private $zoom;
    private $area;

    public function __construct($id, $name, $lat, $lng, $zoom, $area)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->zoom = $zoom;
        $this->area = $area;
    }

    /** Name (or description) of location
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *  Latitude
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /** Longitude
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /** Integer used to set zoom level on maps (most likely Google Maps)
     * @return int
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * @param int $zoom
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }

    /** (Dutch) Textual representation of region this measurement is done in
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param string $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * Alphanumeric representation of a unique identifier
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
<?php

namespace rws\Entities;


class Sensor
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMeasuringUnit()
    {
        return $this->measuring_unit;
    }

    /**
     * @param mixed $measuring_unit
     */
    public function setMeasuringUnit($measuring_unit)
    {
        $this->measuring_unit = $measuring_unit;
    }
    //[sensor_code] => Fp
    //[sensor_name] => Piekfrequentie
    //[measurement] => mHz
    private $id;
    private $name;
    private $measuring_unit;

}
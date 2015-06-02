<?php

namespace rws\Entities;


class Measurement
{
    /**
     * @var \DateTime
     */
    private $time;
    /**
     * @var float
     */
    private $measurement;
    /**
     * @var boolean
     */
    private $is_prediction;

    /**
     * @param \DateTime $time
     * @return Measurement
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @param float $measurement
     * @return Measurement
     */
    public function setMeasurement($measurement)
    {
        $this->measurement = $measurement;
        return $this;
    }

    /**
     * @param boolean $is_prediction
     * @return Measurement
     */
    public function setIsPrediction($is_prediction)
    {
        $this->is_prediction = $is_prediction;
        return $this;
    }

    public function readableTime()
    {
        return $this->time->format("r");
    }

    public function __toString()
    {
        $string = $this->measurement;
        if ($this->is_prediction) {
            $string .= ' (predicted) ';
        }
        $string .= 'at ' . $this->readableTime();
        return $string;
    }

}
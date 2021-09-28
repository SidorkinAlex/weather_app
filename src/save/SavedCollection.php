<?php


namespace SidorkinAlex\Weatherapp\save;


class SavedCollection implements SavedCollectionInterface
{
    private $temperature;
    private $windSpeed;
    private $windDirection;
    private $pressure;
    private $date;

    /**
     * SavedCollection constructor.
     * @param $temperature
     * @param $windSpeed
     * @param $windDirection
     * @param $pressure
     * @param $date
     */
    public function __construct($temperature, $windSpeed, $windDirection, $pressure, $date)
    {
        $this->temperature = $temperature;
        $this->windSpeed = $windSpeed;
        $this->windDirection = $windDirection;
        $this->pressure = $pressure;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @return mixed
     */
    public function getWindSpeed()
    {
        return $this->windSpeed;
    }

    /**
     * @return mixed
     */
    public function getWindDirection()
    {
        return $this->windDirection;
    }

    /**
     * @return mixed
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
}
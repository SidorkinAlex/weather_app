<?php


namespace SidorkinAlex\Weatherapp\save;


interface SavedCollectionInterface
{
    public function __construct($temperature, $windSpeed, $windDirection, $pressure, $date);

    public function getTemperature();

    public function getWindSpeed();

    public function getWindDirection();

    public function getPressure();

    public function getDate();

}
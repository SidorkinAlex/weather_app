<?php


namespace SidorkinAlex\Weatherapp\parameter;


use SidorkinAlex\Weatherapp\config\AppConfigInterface;

class InputParams implements InputParamsInterface
{
    private $lat;
    private $lon;
    private $saveFormat;

    public function __construct($lat, $lon, $saveFormat)
    {
        $this->lat = $lat;
        $this->lon = $lon;
        $this->saveFormat = $saveFormat;
    }


    public function getLat()
    {
        return $this->lat;
    }


    public function getLon()
    {
        return $this->lon;
    }


    public function getSaveFormat()
    {
        return $this->saveFormat;
    }


}
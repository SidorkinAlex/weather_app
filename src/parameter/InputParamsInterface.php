<?php


namespace SidorkinAlex\Weatherapp\parameter;




interface InputParamsInterface
{
    public function getSaveFormat();
    public function getLon();
    public function getLat();
}
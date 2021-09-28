<?php


namespace SidorkinAlex\Weatherapp\config;


interface AppConfigInterface
{

    public function getDefaultSaveFormat();

    public function getDefaultLon();

    public function getDefaultLat();

    public function getToken();

    public function getURL();
}
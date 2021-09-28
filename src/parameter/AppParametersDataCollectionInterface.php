<?php


namespace SidorkinAlex\Weatherapp\parameter;


use SidorkinAlex\Weatherapp\config\AppConfigInterface;

interface AppParametersDataCollectionInterface
{
    public function __construct(AppConfigInterface $config,$lat=null,$lon=null,$saveFormat=null);
    public function getSaveFormat(): string;
    public function getLon();
    public function getLat();
    public function getToken(): string;
    public function getURL(): string;

}
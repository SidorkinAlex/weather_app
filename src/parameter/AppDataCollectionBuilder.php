<?php


namespace SidorkinAlex\Weatherapp\parameter;


use SidorkinAlex\Weatherapp\config\AppConfigInterface;

class AppDataCollectionBuilder
{
    public static function buildAppParametersData(InputParamsInterface $inputParams,AppConfigInterface $appConfig):AppParametersDataCollectionInterface{
        return new AppParametersDataCollection($appConfig,$inputParams->getLat(),$inputParams->getLon(),$inputParams->getSaveFormat());
    }

}
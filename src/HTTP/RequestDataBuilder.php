<?php


namespace SidorkinAlex\Weatherapp\HTTP;


use SidorkinAlex\Weatherapp\parameter\AppParametersDataCollectionInterface;
use SidorkinAlex\Weatherapp\parameter\ParametersFieldsCollection;

class RequestDataBuilder
{
    public static function buildRequestDataWeather(AppParametersDataCollectionInterface $appParametersDataCollection){
        $data = [
            ParametersFieldsCollection::LON => $appParametersDataCollection->getLon(),
            ParametersFieldsCollection::LAT => $appParametersDataCollection->getLat(),
        ];
        $header = self::token2Header($appParametersDataCollection);
        return new RequestData($appParametersDataCollection->getURL(),$data,$header,"GET");
    }

    private static function token2Header (AppParametersDataCollectionInterface $appParametersDataCollection){
        return array(
            "X-Yandex-API-Key: {$appParametersDataCollection->getToken()}"
        );
    }
}
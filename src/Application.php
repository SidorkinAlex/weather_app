<?php

namespace SidorkinAlex\Weatherapp;

use Psr\Log\LoggerInterface;

use SidorkinAlex\Weatherapp\config\ConfigBuilder;
use SidorkinAlex\Weatherapp\HTTP\CURLSender;
use SidorkinAlex\Weatherapp\HTTP\RequestDataBuilder;
use SidorkinAlex\Weatherapp\logger\LoggerWeatherapp;
use SidorkinAlex\Weatherapp\parameter\AppDataCollectionBuilder;
use SidorkinAlex\Weatherapp\parameter\InputParameterCreator;
use SidorkinAlex\Weatherapp\save\Saver;
use SidorkinAlex\Weatherapp\validation\ValidationFactory;

class Application
{
    const CONFIG_PATH = '../config.json';
    public static LoggerInterface $loger;

    public function exec():void
    {
        self::$loger= new LoggerWeatherapp();
        try {
            $this->start();
        } catch (\Exception $exception){
            self::$loger->error("{$exception->getCode()} {$exception->getMessage()}");
        }
    }

    public function start(){
        $config = ConfigBuilder::getConfig();
        $paramsParser = new InputParameterCreator();
        $inputParams = $paramsParser->getInputParams();
        $appParams = AppDataCollectionBuilder::buildAppParametersData($inputParams,$config);
        $HTTPRequestData = RequestDataBuilder::buildRequestDataWeather($appParams);
        $response = CURLSender::send($HTTPRequestData);
        $validator = ValidationFactory::buildValidator($response,$appParams->getSaveFormat());
        $saver = new Saver();
        $saver->save($validator->convert($validator->validateData()),$appParams->getSaveFormat());
    }
}
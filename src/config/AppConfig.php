<?php


namespace SidorkinAlex\Weatherapp\config;


class AppConfig implements AppConfigInterface
{
    private string $yandexAPIToken;
    private string $corYandexURL;
    private $defaultLat;
    private $defaultLon;
    private string $saveFormat;

    /**
     * AppConfig constructor.
     */
    public function __construct(string $jsonString)
    {
        if(!$this->isJson($jsonString)){
            throw new \Exception('error create AppConfig Object $jsonString is not valid json',1);
        }
        $this->init($jsonString);
    }

    function isJson($string):bool{
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    private function init(string $jsonString)
    {
     $initionData = json_decode($jsonString,1);
     $this->yandexAPIToken = $this->existsInitionDataKey($initionData,'yandexAPIToken');
     $this->corYandexURL = $this->existsInitionDataKey($initionData,'corYandexURL');
     $this->defaultLat = $this->existsInitionDataKey($initionData,'defaultLat');
     $this->defaultLon = $this->existsInitionDataKey($initionData,'defaultLon');
     $this->saveFormat = $this->existsInitionDataKey($initionData,'saveFormat');

    }

    private function existsInitionDataKey(array $initionData, string $string)
    {
        if(is_array($initionData) && !array_key_exists($string,$initionData)){
            throw new \Exception("error create AppConfig Object key $string is not exists in initionData array",2);
        }
        return $initionData[$string];
    }

    public function getDefaultSaveFormat()
    {
        return $this->saveFormat;
    }

    public function getDefaultLon()
    {
        return $this->defaultLon;
    }

    public function getDefaultLat()
    {
        return $this->defaultLat;
    }

    public function getToken(): string
    {
        return $this->yandexAPIToken;
    }

    public function getURL(): string
    {
        return $this->corYandexURL;
    }
}
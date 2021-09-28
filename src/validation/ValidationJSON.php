<?php


namespace SidorkinAlex\Weatherapp\validation;


use SidorkinAlex\Weatherapp\HTTP\Response;
use SidorkinAlex\Weatherapp\save\SavedCollection;
use SidorkinAlex\Weatherapp\save\SavedCollectionInterface;

class ValidationJSON implements ValidationInterface
{
    private SavedCollectionInterface $savedCollection;
    public function __construct(Response $response)
    {
        if($response->getCode() == 200) {
            $this->response2savedCollection($response);
        } else {
            throw new \Exception("ValidationJSON error response code is not 200 is {$response->getCode()}");
        }
    }

    private function response2savedCollection(Response $response)
    {
        $responseData = json_decode($response->getData(),1);
        $this->savedCollection = new SavedCollection(
            $responseData['fact'][ValidatorCollectionKeys::TEMP],
            $responseData['fact'][ValidatorCollectionKeys::WIND_SPEED],
            $responseData['fact'][ValidatorCollectionKeys::WIND_DIR],
            $responseData['fact'][ValidatorCollectionKeys::PRESSURE_MM],
            date('d.m.Y H:i:s', $responseData['fact'][ValidatorCollectionKeys::OBS_TIME])
        );
    }


    public function validateData():array{
        return[
            ValidatorCollectionKeys::OBS_TIME => $this->savedCollection->getDate(),
            ValidatorCollectionKeys::TEMP => $this->savedCollection->getTemperature(),
            ValidatorCollectionKeys::WIND_DIR => $this->savedCollection->getWindDirection(),
            ValidatorCollectionKeys::WIND_SPEED => $this->savedCollection->getWindSpeed(),
            ValidatorCollectionKeys::PRESSURE_MM => $this->savedCollection->getPressure(),
        ];
    }

    public function convert(array $validateData){
        return json_encode($validateData);
    }
}
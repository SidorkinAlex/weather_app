<?php


namespace SidorkinAlex\Weatherapp\validation;


use SidorkinAlex\Weatherapp\HTTP\Response;

class ValidationFactory
{
    public static function buildValidator(Response $response,string $type):ValidationInterface
    {
        if($type == 'json'){
            return new ValidationJSON($response);
        } elseif ($type == 'xml'){
            return new ValidationXML($response);
        } else {
            throw new \Exception("error ValidationFactory is not valid type parameters {$type}");
        }

    }

}
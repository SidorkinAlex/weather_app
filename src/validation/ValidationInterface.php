<?php


namespace SidorkinAlex\Weatherapp\validation;


use SidorkinAlex\Weatherapp\HTTP\Response;

interface ValidationInterface
{
    public function __construct(Response $response);

    public function validateData():array;

    public function convert(array $validateData);
}
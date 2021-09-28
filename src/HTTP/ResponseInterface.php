<?php


namespace SidorkinAlex\Weatherapp\HTTP;


interface ResponseInterface
{
    public function __construct(string $response, array $curlInfo);
    public function getData(): string;
    public function getCode();
}
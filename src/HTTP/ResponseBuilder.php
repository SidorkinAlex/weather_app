<?php


namespace SidorkinAlex\Weatherapp\HTTP;


class ResponseBuilder
{
    public static function buildResponse(string $urlResponse, array $options):ResponseInterface {
        $response = new Response($urlResponse,$options);
        return $response;
    }
}
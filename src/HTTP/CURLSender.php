<?php


namespace SidorkinAlex\Weatherapp\HTTP;


use SidorkinAlex\Weatherapp\Application;

class CURLSender
{

    public static function send(RequestData $requestData):ResponseInterface{

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $requestData->getUrl(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $requestData->getMethods(),
            CURLOPT_POSTFIELDS => $requestData->getData(),
            CURLOPT_HTTPHEADER => $requestData->getHeaders(),
        ));

        $urlResponse = curl_exec($curl);

        $options = curl_getinfo($curl);
        $response = ResponseBuilder::buildResponse($urlResponse,$options);
        curl_close($curl);

        return $response;
    }

}
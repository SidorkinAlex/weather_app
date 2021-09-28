<?php


namespace SidorkinAlex\Weatherapp\validation;


class Array2XML
{
    public static function convert(array $array)
    {
        $xml = new \SimpleXMLElement('<root/>');
        foreach ($array as $key => $value ){
            if(!is_numeric($key)) {
                $xml->addChild("$key","$value");
            } else {
                $xml->addChild("item$key","$value");
            }
        }
        return  $xml->asXML();
    }
}
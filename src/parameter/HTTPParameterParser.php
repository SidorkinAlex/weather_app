<?php


namespace SidorkinAlex\Weatherapp\parameter;


class HTTPParameterParser
{


    public static function parse()
    {
        $options[ParametersFieldsCollection::LAT] = isset($options[ParametersFieldsCollection::LAT]) ? $_REQUEST[ParametersFieldsCollection::LAT] : null;
        $options[ParametersFieldsCollection::LON] = isset($options[ParametersFieldsCollection::LON]) ? $_REQUEST[ParametersFieldsCollection::LON] : null;
        $options[ParametersFieldsCollection::SAVE_FORMAT] = isset($options[ParametersFieldsCollection::SAVE_FORMAT]) ? $_REQUEST[ParametersFieldsCollection::SAVE_FORMAT] : null;
        return new InputParams($options[ParametersFieldsCollection::LAT],
            $options[ParametersFieldsCollection::LON],
            $options[ParametersFieldsCollection::SAVE_FORMAT]);
    }
}
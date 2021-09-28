<?php


namespace SidorkinAlex\Weatherapp\parameter;




class CLIParameterParser
{
        public static function parse(): InputParamsInterface
    {
        $long_options = array_map(function ($n) {
            return $n . "::";
        }, [ParametersFieldsCollection::LAT,ParametersFieldsCollection::LON,ParametersFieldsCollection::SAVE_FORMAT]);

        $options = getopt("", $long_options);
        $options[ParametersFieldsCollection::LAT] = $options[ParametersFieldsCollection::LAT] ?? null;
        $options[ParametersFieldsCollection::LON] = $options[ParametersFieldsCollection::LON] ?? null;
        $options[ParametersFieldsCollection::SAVE_FORMAT] = $options[ParametersFieldsCollection::SAVE_FORMAT] ?? null;

        return new InputParams($options[ParametersFieldsCollection::LAT],
                                $options[ParametersFieldsCollection::LON],
                                $options[ParametersFieldsCollection::SAVE_FORMAT]);
    }

}
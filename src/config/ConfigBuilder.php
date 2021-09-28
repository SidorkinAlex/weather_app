<?php


namespace SidorkinAlex\Weatherapp\config;


class ConfigBuilder
{
    const APP_CONFIG_PATH = "config.json";
    public static function getConfig():AppConfigInterface{
        $json_string=file_get_contents(self::APP_CONFIG_PATH);
        $config = new AppConfig($json_string);
        return $config;
    }

}
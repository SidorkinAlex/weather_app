<?php


namespace SidorkinAlex\Weatherapp\logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class LoggerWeatherapp extends AbstractLogger implements LoggerInterface
{
    const LOG_FILE_NAME = "error.log";
    public function log($level, $message, array $context = array())
    {
        $date=gmdate("d.m.Y H:i:s");
        file_put_contents(self::LOG_FILE_NAME,"$date || $level || $message \n",FILE_APPEND);
    }
}
<?php


namespace SidorkinAlex\Weatherapp\parameter;


use SidorkinAlex\Weatherapp\config\AppConfigInterface;

class AppParametersDataCollection implements AppParametersDataCollectionInterface
{
    private float $lat;
    private float $lon;
    private string $saveFormat;
    private string $token;
    private string $url;

    /**
     * @throws \Exception
     */
    public function __construct(AppConfigInterface $config, $lat = null, $lon = null, $saveFormat = null)
    {
        $this->initLat($config, $lat);
        $this->initLon($config, $lon);
        $this->initSaveFormat($config, $saveFormat);
        $this->initToken($config);
        $this->initURL($config);
    }

    private function initLat(AppConfigInterface $config, $lat)
    {
        if (
            !is_null($lat) &&
            (is_string($lat) || is_float($lat))
        ) {
            if (is_string($lat)) {
                $this->lat = (float) $lat;
            }
            $this->lat = $lat;
        } else {
            $this->lat = $config->getDefaultLat();
        }
    }

    private function initLon(AppConfigInterface $config, $lon)
    {
        if (
            !is_null($lon) &&
            (is_string($lon) || is_float($lon))
        ) {
            if (is_string($lon)) {
                $this->lon = (float) $lon;
            }
            $this->lon = $lon;
        } else {
            $this->lon = (float) $config->getDefaultLon();
        }
    }

    private function initSaveFormat(AppConfigInterface $config, $saveFormat)
    {
        if (!is_null($saveFormat) && in_array($saveFormat, ParametersFieldsCollection::COLLECTION_FORMAT)) {
            $this->saveFormat = $saveFormat;
        } else {
            $this->saveFormat =  $config->getDefaultSaveFormat();
        }
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * @return string
     */
    public function getSaveFormat(): string
    {
        return $this->saveFormat;
    }

    private function initToken(AppConfigInterface $config)
    {
        if(!empty($config->getToken())) {
            $this->token = $config->getToken();
        } else {
            throw new \Exception("error create AppParametersDataCollection token in config->getToken() is empty",3);
        }
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    private function  initURL(AppConfigInterface $config)
    {
        if (!empty($config->getURL())) {
            $this->url = $config->getURL();
        } else {
            throw new \Exception("error create AppParametersDataCollection url in config->getURL() is empty",3);
        }
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }


}
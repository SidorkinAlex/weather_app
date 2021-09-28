<?php


namespace SidorkinAlex\Weatherapp\parameter;


use SidorkinAlex\Weatherapp\config\AppConfigInterface;

class InputParameterCreator
{

    private InputParamsInterface $inputParams;
    private bool $isCli;
    public function __construct()
    {
        $this->checkLaunchSource();
        $this->parseParams();
    }

    private function checkLaunchSource()
    {
        $this->isCli = PHP_SAPI == 'cli' || (!isset($_SERVER['DOCUMENT_ROOT']) && !isset($_SERVER['REQUEST_URI']));
    }

    private function parseParams()
    {
        if($this->isCli){
            $this->parseParamsFromCLI();
        } else {
            $this->createRequestParams();
        }
    }

    private function parseParamsFromCLI()
    {
        $this->inputParams= CLIParameterParser::parse();
    }

    private function createRequestParams()
    {
        $this->inputParams = HTTPParameterParser::parse();
    }

    /**
     * @return InputParamsInterface
     */
    public function getInputParams(): InputParamsInterface
    {
        return $this->inputParams;
    }


}
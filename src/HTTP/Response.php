<?php


namespace SidorkinAlex\Weatherapp\HTTP;


class Response implements ResponseInterface
{
    private string $response;
    private string $responseCode;

    /**
     * Response constructor.
     * @param string $response
     * @param array $curlInfo
     */
    public function __construct(string $response, array $curlInfo)
    {
        $this->response = $response;
        $this->responseCode =(string) $curlInfo['http_code'];
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->responseCode;
    }


}
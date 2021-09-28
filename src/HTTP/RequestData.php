<?php


namespace SidorkinAlex\Weatherapp\HTTP;


class RequestData implements RequestDataInterface
{
    private string $url;
    private array $data;
    private array $headers;
    private string $methods;

    /**
     * RequestData constructor.
     * @param string $url
     * @param array $data
     * @param array $headers
     * @param string $methods
     */
    public function __construct(string $url, array $data, array $headers, string $methods)
    {
        $this->url = $url;
        $this->data = $data;
        $this->headers = $headers;
        $this->methods = $methods;
    }


    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getMethods(): string
    {
        return $this->methods;
    }
}
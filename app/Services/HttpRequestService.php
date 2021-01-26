<?php


namespace app\Services;


use GuzzleHttp\Client;

class HttpRequestService
{

    /**
     * @var Client
     */
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get($url, array $queryParam = [])
    {

        try {
            $jsonResponse = $this->client->request('get', $url, $queryParam);
            return json_decode($jsonResponse->getBody()->getContents(), true);
        }
        catch (\Exception$e){
            return false;
        }




    }

}
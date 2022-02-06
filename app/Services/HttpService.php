<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\ConnectException;

class HttpService
{
    private object $client;
    /**
     * Http Service uses guzzle package to perform http queries
     */
    public function __construct()
    {
        $this->client =  new Client();
    }
    
    /**
     * Http Service Get Request Method
     *
     * @param string $url
     * @param array|null $queryStringArray
     * @return mixed
     */
    public function get(string $url, array $queryStringArray = null) : mixed
    {
        try {
            $queryString = $queryStringArray ? ['query'  => $queryStringArray] : [];

            $response = $this->client->request('GET', $url, $queryString);
    
            return $response->getStatusCode() ? $response->getBody() : false;
        } catch (ClientException $e) {
            return $e->getResponse()->getBody(true);
        } catch (ServerException $e) {
            return false;
        } catch (ConnectException $e) {
            return false;
        }
    }
}

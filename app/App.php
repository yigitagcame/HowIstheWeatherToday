<?php

namespace App;

use App\Services\HttpService;

class App
{
    private object $request;

    public function __construct(HttpService $apiRequest)
    {
        $this->request = $apiRequest;
    }

    public function run() : void
    {
        echo 'Heelo World!';
    }
}

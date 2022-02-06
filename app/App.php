<?php

namespace App;

use App\Services\HttpService;
use App\Services\CommandLineService;

class App
{
    private object $request;
    private object $commandLine;

    public function __construct(HttpService $apiRequest, CommandLineService $commandLine)
    {
        $this->request = $apiRequest;
        $this->commandLine = $commandLine;
    }

    public function run() : void
    {
        $this->commandLine->init(['c:'], ['city:']);
        $city = $this->commandLine->input('city');
        echo $city;
    }
}

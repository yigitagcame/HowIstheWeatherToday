<?php

namespace App;

use App\Services\CommandLineService;
use App\Services\HttpService;

class App
{
    private object $request;
    private object $commandLine;

    /**
     * The app requires Http and Commandline Services to run
     *
     * @param HttpService $apiRequest
     * @param CommandLineService $commandLine
     */
    public function __construct(HttpService $apiRequest, CommandLineService $commandLine)
    {
        $this->request = $apiRequest;
        $this->commandLine = $commandLine;
    }

    /**
     * This is where the app lives
     */
    public function run() : bool
    {
        if (!$this->commandLine->isEnvCLI()) {
            return false;
        }
        $this->commandLine->init(['c:'], ['city:']);
        $city = $this->commandLine->input('city');

        $queryString = [
          'q' => $city,
          'appid' => $_ENV['OPENWEATHERMAP_API_KEY'],
          'units' => $_ENV['TEMPERATURE_MEASUREMENT_UNIT']
        ];
        $response = $this->request->get('https://api.openweathermap.org/data/2.5/weather', $queryString);
        $responseDecoded = json_decode($response);

        if (isset($responseDecoded->cod) && $responseDecoded->cod == 200) {
            $description = $responseDecoded->weather[0]->description;
            $degree = $responseDecoded->main->temp;
          
            echo $description. ', ';
            echo $degree .' degree';
            return true;
        }

        if (isset($responseDecoded->cod) && $responseDecoded->cod != 200 && $responseDecoded->message) {
            echo $responseDecoded->message;
            return true;
        }
        
        echo 'The weather station temporarily closed! Please try again later';

        return true;
    }
}

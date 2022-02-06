<?php

namespace App\Services;

class CommandLineService
{
    private array $cli = [];
    private bool $isEnvCLI = true;

    /**
     * Command Line initilization method
     *
     * @param array $shortOptionsArray
     * @param array $longOptions
     * @return void
     */
    public function init(array $shortOptionsArray, array $longOptions = []) : void
    {
        if (PHP_SAPI == "cli") {
            $shortOptions = implode($shortOptionsArray);
            $this->cli = getopt($shortOptions, $longOptions);
        } else {
            $this->isEnvCLI = false;
        }
    }
    /**
     * Returns command line input values by input name
     *
     * @param string $key
     * @return mixed
     */
    public function input(string $key) : mixed
    {
        return array_key_exists($key, $this->cli) ? $this->cli[$key] : null;
    }

    /**
     * Returns whether application run env is a command-line or not
     *
     * @return boolean
     */
    public function isEnvCLI() : bool
    {
        return $this->isEnvCLI;
    }
}

<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Services\HttpService;

class HttpServiceTest extends TestCase
{
    /** @test */
    public function aGetTest()
    {
        $http = new HttpService();

        $this->assertEquals(true, $http->get());
    }
}

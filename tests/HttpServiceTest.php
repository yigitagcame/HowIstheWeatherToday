<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Services\HttpService;

class HttpServiceTest extends TestCase
{
    /** @test */
    public function aLegitGetRequestCanBeSentSuccessfully()
    {
        $http = new HttpService();
        $response = $http->get('https://google.com');
    
        $this->assertNotEquals(false, $response);
    }

    /** @test */
    public function aNonlegitGetRequestCanNotBeSentSuccessfully()
    {
        $http = new HttpService();
        $response = $http->get('https://google');
    
        $this->assertEquals(false, $response);
    }
}

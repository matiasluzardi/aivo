<?php

namespace Tests\Functional;

class FacebookTest extends BaseTestCase
{
    /**
     * Test a correct response 
     */
    public function testProfileFacebook200()
    {
        $response = $this->runApp('GET', '/profile/facebook/1348339814');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test  the a fail response 
     */
    public function testProfileFacebook500()
    {
        $response = $this->runApp('GET', '/profile/facebook/sddsas');
        $this->assertEquals(500, $response->getStatusCode());      
    }
  
}
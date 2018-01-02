<?php

namespace Tests\Functional;

class HomepageTest extends BaseTestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
    public function testProfileFacebook()
    {
        $response = $this->runApp('GET', '/profile/facebook/');
        $this->assertEquals(200, $response->getStatusCode());
    }

  
}
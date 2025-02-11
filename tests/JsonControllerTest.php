<?php

/**
 * JsonControllerTest class.
 */

namespace Alltube\Test;

use Alltube\Controller\JsonController;

/**
 * Unit tests for the FrontController class.
 */
class JsonControllerTest extends ControllerTest
{
    /**
     * Prepare tests.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->controller = new JsonController($this->container);
    }

    /**
     * Test the json() function.
     *
     * @return void
     */
    public function testJson()
    {
        $this->assertRequestIsOk('json', ['url' => 'https://www.youtube.com/watch?v=M7IpKCZ47pU']);
    }

    /**
     * Test the json() function with an error.
     *
     * @return void
     */
    public function testJsonWithError()
    {
        $this->assertRequestIsServerError('json', ['url' => 'http://example.com/foo']);
    }

    /**
     * Test the json() function without the URL parameter.
     *
     * @return void
     */
    public function testJsonWithoutUrl()
    {
        $this->assertRequestIsClientError('json');
    }
}

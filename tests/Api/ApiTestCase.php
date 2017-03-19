<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestResponse;

abstract class ApiTestCase extends TestCase
{
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var array
     */
    protected $scopes = [];

    /**
     * @var int
     */
    protected $version = 1;

    /**
     * @var string
     */
    protected $baseUrl;

//    public static function setUpBeforeClass()
//    {
//        parent::setUpBeforeClass();
//        print "\n***** SETTING UP DATABASE *****\n";
//        shell_exec('rm database/testdb.sqlite');
//        shell_exec('touch database/testdb.sqlite');
//        shell_exec('php artisan --database=testing --env=testing migrate:refresh');
//        shell_exec('php artisan --database=testing --env=testing db:seed');
//    }

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->baseUrl = env('APP_URL', 'http://127.0.0.1') . '/api/v' . $this->version;
    }

    /**
     * @param string $uri
     * @param array $headers
     * @return TestResponse
     */
    public function get($uri, array $headers = [])
    {
        return parent::get($this->baseUrl . $uri, array_merge($this->headers, $headers));
    }

    /**
     * @param array $headers
     * @return TestResponse
     */
    public function getJson($uri, array $headers = [])
    {
        return parent::getJson($this->baseUrl . $uri, array_merge($this->headers, $headers));
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function post($uri, array $data = [], array $headers = [])
    {
        return parent::post($this->baseUrl . $uri, $data, array_merge($this->headers, $headers));
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function postJson($uri, array $data = [], array $headers = [])
    {
        return parent::postJson($this->baseUrl . $uri, $data, array_merge($this->headers, $headers));
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function put($uri, array $data = [], array $headers = [])
    {
        return parent::put($this->baseUrl . $uri, $data, array_merge($this->headers, $headers));
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function putJson($uri, array $data = [], array $headers = [])
    {
        return parent::putJson($this->baseUrl . $uri, $data, array_merge($this->headers, $headers));
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function patch($uri, array $data = [], array $headers = [])
    {
        return parent::patch($this->baseUrl . $uri, $data, array_merge($this->headers, $headers));
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function patchJson($uri, array $data = [], array $headers = [])
    {
        return parent::patchJson($this->baseUrl . $uri, $data, array_merge($this->headers, $headers));
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function delete($uri, array $data = [], array $headers = [])
    {
        return parent::delete($this->baseUrl . $uri, $data, array_merge($this->headers, $headers));
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function deleteJson($uri, array $data = [], array $headers = [])
    {
        return parent::deleteJson($this->baseUrl . $uri, $data, array_merge($this->headers, $headers));
    }

    /**
     * @param array $actualData
     */
    public function assertApiResponse(Array $actualData)
    {
        return $this->assertApiSuccess()
            ->assertContainsId()
            ->assertModelData($actualData);
    }

    /**
     * @return int
     */
    public function getModelId()
    {
        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['data'];

        return $responseData['id'];
    }

    /**
     * @param array $actualData
     */
    public function assertModelData(Array $actualData)
    {
        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['data'];
        foreach ($actualData as $key => $value) {
            if (isset($actualData[$key]) && isset($responseData[$key])) $this->assertEquals($actualData[$key], $responseData[$key]);
        }
    }
}

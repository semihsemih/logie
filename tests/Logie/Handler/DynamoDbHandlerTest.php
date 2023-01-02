<?php

namespace Logie\Handler;

use Aws\DynamoDb\DynamoDbClient;
use PHPUnit\Framework\TestCase;

class DynamoDbHandlerTest extends TestCase
{
    public function testHandler()
    {
        $client = $this->createMock(DynamoDbClient::class);

        $handler = new DynamoDbHandler($client, 'foo');

        $logArr = [
            'timestamp' => time(),
            'level'     => 'info',
            'message'   => 'test'
        ];

        $handler->handle($logArr);

        $this->assertTrue(true);
    }
}
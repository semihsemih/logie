<?php

namespace Logie\Handler;

use Aws\DynamoDb\DynamoDbClient;

class DynamoDbHandler implements HandlerInterface
{
    public function __construct(
        public DynamoDbClient   $client,
        private readonly string $table
    )
    {
    }

    public function handle(array $vars): void
    {
        $this->client->putItem([
            'TableName' => $this->table,
            'Item'      => [
                'id'      => ['S' => uniqid(more_entropy: true)],
                'ts'      => ['S' => $vars['timestamp']],
                'level'   => ['S' => $vars['level']],
                'message' => ['S' => $vars['message']],
            ]
        ]);
    }
}
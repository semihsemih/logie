<?php

namespace Logie\Handler;

use PHPUnit\Framework\TestCase;

class FileHandlerTest extends TestCase
{
    public function testHandle()
    {
        $logFileName = tempnam('/tmp', date('y-m-d'));
        $handler = new FileHandler($logFileName);

        $logArr = [
            'timestamp' => time(),
            'level'     => 'info',
            'message'   => 'test'
        ];

        $handler->handle($logArr);

        $file = fopen($logFileName, 'r');
        $content = fread($file, filesize($logFileName));

        unlink($logFileName);

        $this->assertEquals($logArr['timestamp'] . " - info - test" . PHP_EOL, $content);
    }
}

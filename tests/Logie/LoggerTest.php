<?php

namespace Logie;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;

class LoggerTest extends TestCase
{
    public function testLog()
    {
        $handler = $this
            ->createMock('Logie\Handler\HandlerInterface');

        $logger = new Logger($handler);

        $logger->log(LogLevel::WARNING, 'an warning has occurred.');

        $this->assertTrue(true);
    }
}
<?php

namespace Logie;

use DateTimeImmutable;
use Psr\Log\AbstractLogger;
use Logie\Handler\HandlerInterface;

class Logger extends AbstractLogger
{
    public function __construct(private readonly HandlerInterface $handler)
    {
    }

    /**
     * @inheritDoc
     */
    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->handler->handle([
            'message' => $message,
            'level'   => $level,
            'timestamp' => (new DateTimeImmutable())->format('c'),
        ]);
    }
}

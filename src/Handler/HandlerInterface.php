<?php

namespace Logie\Handler;

interface HandlerInterface
{
    public function handle(array $vars): void;
}

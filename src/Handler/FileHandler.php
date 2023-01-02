<?php

namespace Logie\Handler;

use LogicException;
use UnexpectedValueException;

class FileHandler implements HandlerInterface
{
    public function __construct(private string|null $path)
    {
    }

    public function handle(array $vars): void
    {
        $formatted = $vars['timestamp'] . " - " . $vars['level'] . " - " . $vars['message'] . PHP_EOL;

        if ($this->path === null || $this->path === '') {
            throw new LogicException('Missing filename');
        }

        $dir = dirname($this->path);
        if (!file_exists($dir)) {
            $status = mkdir($dir, 0777, true);

            if ($status === false && !is_dir($dir)) {
                throw new UnexpectedValueException(sprintf('There is no existing directory at "%s"', $dir));
            }
        }

        $file = fopen($this->path, 'a');

        fwrite($file, $formatted);
        fclose($file);
    }
}


# Logie - Logging for PHP
![Logo](https://i.imgur.com/ap1wKnCl.png)


This library implements the [PSR-3](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md) interface that you can type-hint against in your own libraries to keep a maximum of interoperability.

## Usage

```
$handler = new Logie\Handler\FileHandler($logFileName);
$logger = new Logie\Logger($handler);
$logger->log(LogLevel::INFO, 'an info has occurred.');
```

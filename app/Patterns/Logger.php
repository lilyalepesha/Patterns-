<?php

declare(strict_types=1);

namespace App\Patterns;

use BadMethodCallException;

// Singleton
final class Logger
{
    /**
     * @var Logger|null
     */
    private static ?Logger $instance = null;

    private function __construct() {}

    /**
     * @return void
     */
    public function __clone(): void {}

    /**
     * @return never
     */
    public function __wakeup(): never
    {
        throw new BadMethodCallException('Cannot unserialize a singleton.');
    }

    /**
     * @return Logger
     */
    public static function getInstance(): Logger
    {
        return self::$instance ??= new Logger();
    }

    /**
     * @param string $message
     * @return void
     */
    public function log(string $message): void
    {
        $date = date('Y-m-d H:i:s');

        file_put_contents(
            __DIR__ . '/app.log',
            "[$date] $message" . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }
}

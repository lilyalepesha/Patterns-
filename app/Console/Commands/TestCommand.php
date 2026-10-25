<?php

namespace App\Console\Commands;

use App\Patterns\Logger;
use App\Patterns\Money;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:test-command')]
#[Description('Command description')]
class TestCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Logger::getInstance()->log('Пример');
        Money::fromCents(52);
    }
}

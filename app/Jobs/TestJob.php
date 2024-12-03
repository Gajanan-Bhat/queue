<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJob implements ShouldQueue, ShouldBeEncrypted
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $connection = 'redis';
    public $queue = 'notifications';
    public $backoff = 30;
    public $timeout = 60;
    public $tries = 0;
    public $delay = 300;
    public $aftercommit = true;
    public $shouldBeEncrypted = true;

    public $uniqueId = 'products';
    public $uniqueFor = 10;

    public $deleteWhenMissingModels = true;

    public function __construct($secret)
    {
    }

    public function uniqueId(){
        return $this->product->id;
    }

    public function handle()
    {
    }

    public function retryUntil(){
        return now()->addDay();
    }
}

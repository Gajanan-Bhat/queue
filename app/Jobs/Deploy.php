<?php

namespace App\Jobs;
use App\Models\Site;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;



class Deploy implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $container;
    public $site;
    public $latestCommitHash;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($site, $latestCommitHash)
    {
        $this->site = $site;
        $this->latestCommitHash;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
         app()->make('deployer')
            ->deploy(
                $this->latestCommitHash
            );
         }       
    } 


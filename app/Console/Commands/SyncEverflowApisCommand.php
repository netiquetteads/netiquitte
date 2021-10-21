<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SyncEverflowApisJob;

class SyncEverflowApisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:everflow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync All Data From Everflow APIs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        dispatch(new SyncEverflowApisJob());

        return 'Successfully Sync';
    }
}

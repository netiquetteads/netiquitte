<?php

namespace App\Console\Commands;

use App\Jobs\SyncEverflowApisJob;
use Illuminate\Console\Command;

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
        \Log::info('Cron: SyncEverflowApisJob');

        return 'Successfully Sync';
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RetrieveAccountsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ef:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync EverFlow accounts';

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
        $this->comment('=====================================');
        $this->comment('');
        $this->info('Updating the Dev channels started@:'.Carbon::now()->diffForHumans());
        $this->comment('');
        $this->comment('=====================================');
        $this->comment('');

        return 0;
    }
}

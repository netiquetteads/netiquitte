<?php

namespace App\Console\Commands;

use App\Mail\CampaignMail;
use App\Models\TempEmail;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all temp emails';

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
        $tempEmails = TempEmail::where('email_status', 'pending')->orderBy('id', 'desc')->get();

        foreach ($tempEmails as $key => $tempEmail) {
            $send = \Mail::to($tempEmail->email)->send(new CampaignMail($tempEmail));

            $tempEmail->email_status = 'sent';
            $tempEmail->save();
        }
    }
}

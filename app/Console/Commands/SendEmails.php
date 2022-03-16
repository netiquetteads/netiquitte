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
            // $send = \Mail::to($tempEmail->email)->send(new CampaignMail($tempEmail));

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom('info@netiquetteads.com', 'Netiquette Ads');
            $email->setSubject($tempEmail->email_subject);
            $email->addTo($tempEmail->email, $tempEmail->from_name);
            $email->addContent('text/html', $tempEmail->email_body);
            $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
            try {
                $response = $sendgrid->send($email);
                // \Log::info($response->statusCode());
                // \Log::info($response->headers());
                // \Log::info($response->body());
                // \Log::info($tempEmail->email);
            } catch (Exception $e) {
                // echo 'Caught exception: '. $e->getMessage() ."\n";
                \Log::info($tempEmail->email.' Caught exception: '.$e->getMessage()."\n");
            }

            $tempEmail->email_status = 'sent';
            $tempEmail->save();
        }
    }
}

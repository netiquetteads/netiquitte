<?php

namespace App\Console\Commands;

use App\Models\Unsubscriber;
use Illuminate\Console\Command;

class UnsubscriberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:unsubscriber';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get all unsubscribers from sendgrid';

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
        $apiKey = env('SENDGRID_API_KEY');

        $sg = new \SendGrid($apiKey);
        try {
            $response = $sg->client->suppression()->unsubscribes()->get();
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";

            $results = json_decode($response->body());

            if ($results) {
                foreach ($results as $key => $result) {
                    $unsubscriber = Unsubscriber::where('email', $result->email)->first();
                    if (empty($unsubscriber)) {
                        Unsubscriber::create(['email'=>$result->email]);
                    }
                }
            }

            echo 'done';
        } catch (Exception $ex) {
            echo 'Caught exception: '.$ex->getMessage();
        }
    }
}

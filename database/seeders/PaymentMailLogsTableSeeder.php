<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentMailLogsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payment_mail_logs')->delete();

        \DB::table('payment_mail_logs')->insert([
            0 => [
                'id' => 1,
                'from_name' => 'Owen',
                'email' => 'owen@netiquetteads.com',
                'email_subject' => 'Owen, You have Been Paid',
                'email_body' => '<p>Hey Owen</p><p>Your Payment has been processed for the month of <strong>February 2022</strong> for the amount of <strong>30</strong>.</p><p>For any accounting inquiries please contact <strong>billing@netiquetteads.com</strong></p><p>Thank you for your business.</p>',
                'email_opened' => '1',
                'email_open_date' => '2022-02-23',
                'email_open_time' => '01:55:29',
                'affiliate_id' => 1,
                'created_at' => '2022-02-23 13:53:16',
                'updated_at' => '2022-02-23 13:55:29',
            ],
        ]);
    }
}

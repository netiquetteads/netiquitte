<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentMethodTypeTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payment_method_type')->delete();

        \DB::table('payment_method_type')->insert([
            0 => [
                'id' => 1,
                'name' => 'PayPal',
                'created_at' => '2022-02-08 18:40:33',
                'updated_at' => '2022-03-09 16:50:22',
                'account_name_select' => 0,
                'paypal_email_select' => 1,
                'account_num_select' => 0,
                'routing_select' => 0,
                'notes_select' => 0,
                'custom_email_select' => 0,
                'swift_select' => 0,
            ],
            1 => [
                'id' => 2,
                'name' => 'ACH',
                'created_at' => '2022-02-10 04:03:09',
                'updated_at' => '2022-02-10 04:03:09',
                'account_name_select' => 0,
                'paypal_email_select' => 0,
                'account_num_select' => 0,
                'routing_select' => 0,
                'notes_select' => 0,
                'custom_email_select' => 0,
                'swift_select' => 0,
            ],
        ]);
    }
}

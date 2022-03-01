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
                'updated_at' => '2022-02-08 18:42:08',
            ],
            1 => [
                'id' => 2,
                'name' => 'ACH',
                'created_at' => '2022-02-10 04:03:09',
                'updated_at' => '2022-02-10 04:03:09',
            ],
        ]);
    }
}

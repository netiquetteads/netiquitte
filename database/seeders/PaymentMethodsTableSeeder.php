<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_methods')->delete();
        
        \DB::table('payment_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'account_name' => NULL,
                'account_number' => NULL,
                'routing_number' => NULL,
                'swift' => NULL,
                'paypal_email' => 'tpsvishwas78@gmail.com',
                'created_at' => '2022-02-08 18:40:39',
                'updated_at' => '2022-02-08 18:41:14',
                'deleted_at' => '2022-02-08 18:41:14',
                'explanation' => NULL,
                'company_select' => 0,
                'account_num_select' => 0,
                'routing_select' => 0,
                'explanation_select' => 0,
                'custom_email' => NULL,
                'custom_email_select' => 0,
                'swift_select' => 0,
                'account_name_select' => 0,
                'paypal_email_select' => 9,
                'payment_method_type_id' => 1,
                'affiliate_id' => 172,

            ),
            1 => 
            array (
                'id' => 2,
                'account_name' => 'fehsyedh',
                'account_number' => 'fdhsdh',
                'routing_number' => 'dgshdfh',
                'swift' => 'dfhdfhdf',
                'paypal_email' => 'hdfhdfh',
                'created_at' => '2022-02-10 04:01:15',
                'updated_at' => '2022-02-10 04:01:15',
                'deleted_at' => NULL,
                'explanation' => 'dfhdfhbdf',
                'company_select' => 0,
                'account_num_select' => 4,
                'routing_select' => 5,
                'explanation_select' => 6,
                'custom_email' => 'dhdgfh',
                'custom_email_select' => 7,
                'swift_select' => 8,
                'account_name_select' => 3,
                'paypal_email_select' => 9,
                'payment_method_type_id' => 1,
                'affiliate_id' => 172,

            ),
            2 => 
            array (
                'id' => 3,
                'account_name' => 'Netiquette Ads LLC',
                'account_number' => '2436475868',
                'routing_number' => '57457575',
                'swift' => NULL,
                'paypal_email' => NULL,
                'created_at' => '2022-02-10 04:03:23',
                'updated_at' => '2022-02-10 04:03:23',
                'deleted_at' => NULL,
                'explanation' => NULL,
                'company_select' => 0,
                'account_num_select' => 4,
                'routing_select' => 5,
                'explanation_select' => 0,
                'custom_email' => NULL,
                'custom_email_select' => 0,
                'swift_select' => 0,
                'account_name_select' => 3,
                'paypal_email_select' => 0,
                'payment_method_type_id' => 2,
                'affiliate_id' => 1,

            ),
        ));
        
        
    }
}
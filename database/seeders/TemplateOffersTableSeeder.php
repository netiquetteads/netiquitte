<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TemplateOffersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('template_offers')->delete();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('media')->delete();

        \DB::table('media')->insert([
            0 => [
                'id' => 1,
                'model_type' => 'App\\Models\\User',
                'model_id' => 2,
                'uuid' => 'e84d872b-0966-47b7-a7fa-ea2661b804ac',
                'collection_name' => 'photo',
                'name' => '61bcfbfe60836_8d28bd9be88aa142fe01df3e0ec0fde4-min',
                'file_name' => '61bcfbfe60836_8d28bd9be88aa142fe01df3e0ec0fde4-min.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 3163,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions": {"thumb": true, "preview": true}}',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2021-12-17 21:07:11',
                'updated_at' => '2021-12-17 21:07:12',
            ],
            1 => [
                'id' => 2,
                'model_type' => 'App\\Models\\Advertiser',
                'model_id' => 91,
                'uuid' => '990a7a93-ee03-4c29-a345-e5da47c964d2',
                'collection_name' => 'featured_image',
                'name' => '622e8fbc4413f_download',
                'file_name' => '622e8fbc4413f_download.jpeg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 6404,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions": {"thumb": true, "preview": true}}',
                'responsive_images' => '[]',
                'order_column' => 2,
                'created_at' => '2022-03-13 20:43:41',
                'updated_at' => '2022-03-13 20:43:42',
            ],
        ]);
    }
}

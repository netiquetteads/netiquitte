<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert([
            0 => [
                'id' => 1,
                'title' => 'user_management_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            1 => [
                'id' => 2,
                'title' => 'permission_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            2 => [
                'id' => 3,
                'title' => 'permission_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            3 => [
                'id' => 4,
                'title' => 'permission_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            4 => [
                'id' => 5,
                'title' => 'permission_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            5 => [
                'id' => 6,
                'title' => 'permission_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            6 => [
                'id' => 7,
                'title' => 'role_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            7 => [
                'id' => 8,
                'title' => 'role_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            8 => [
                'id' => 9,
                'title' => 'role_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            9 => [
                'id' => 10,
                'title' => 'role_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            10 => [
                'id' => 11,
                'title' => 'role_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            11 => [
                'id' => 12,
                'title' => 'user_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            12 => [
                'id' => 13,
                'title' => 'user_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            13 => [
                'id' => 14,
                'title' => 'user_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            14 => [
                'id' => 15,
                'title' => 'user_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            15 => [
                'id' => 16,
                'title' => 'user_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            16 => [
                'id' => 17,
                'title' => 'team_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            17 => [
                'id' => 18,
                'title' => 'team_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            18 => [
                'id' => 19,
                'title' => 'team_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            19 => [
                'id' => 20,
                'title' => 'team_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            20 => [
                'id' => 21,
                'title' => 'team_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            21 => [
                'id' => 22,
                'title' => 'audit_log_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            22 => [
                'id' => 23,
                'title' => 'audit_log_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            23 => [
                'id' => 24,
                'title' => 'user_alert_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            24 => [
                'id' => 25,
                'title' => 'user_alert_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            25 => [
                'id' => 26,
                'title' => 'user_alert_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            26 => [
                'id' => 27,
                'title' => 'user_alert_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            27 => [
                'id' => 28,
                'title' => 'setting_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            28 => [
                'id' => 29,
                'title' => 'affiliate_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            29 => [
                'id' => 30,
                'title' => 'affiliate_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            30 => [
                'id' => 31,
                'title' => 'affiliate_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            31 => [
                'id' => 32,
                'title' => 'affiliate_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            32 => [
                'id' => 33,
                'title' => 'affiliate_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            33 => [
                'id' => 34,
                'title' => 'account_status_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            34 => [
                'id' => 35,
                'title' => 'account_status_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            35 => [
                'id' => 36,
                'title' => 'account_status_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            36 => [
                'id' => 37,
                'title' => 'account_status_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            37 => [
                'id' => 38,
                'title' => 'account_status_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            38 => [
                'id' => 39,
                'title' => 'advertiser_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            39 => [
                'id' => 40,
                'title' => 'advertiser_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            40 => [
                'id' => 41,
                'title' => 'advertiser_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            41 => [
                'id' => 42,
                'title' => 'advertiser_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            42 => [
                'id' => 43,
                'title' => 'advertiser_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            43 => [
                'id' => 44,
                'title' => 'label_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            44 => [
                'id' => 45,
                'title' => 'label_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            45 => [
                'id' => 46,
                'title' => 'label_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            46 => [
                'id' => 47,
                'title' => 'label_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            47 => [
                'id' => 48,
                'title' => 'label_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            48 => [
                'id' => 49,
                'title' => 'offer_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            49 => [
                'id' => 50,
                'title' => 'offer_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            50 => [
                'id' => 51,
                'title' => 'offer_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            51 => [
                'id' => 52,
                'title' => 'offer_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            52 => [
                'id' => 53,
                'title' => 'offer_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            53 => [
                'id' => 54,
                'title' => 'balance_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            54 => [
                'id' => 55,
                'title' => 'balance_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            55 => [
                'id' => 56,
                'title' => 'balance_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            56 => [
                'id' => 57,
                'title' => 'balance_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            57 => [
                'id' => 58,
                'title' => 'balance_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            58 => [
                'id' => 59,
                'title' => 'payment_status_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            59 => [
                'id' => 60,
                'title' => 'payment_status_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            60 => [
                'id' => 61,
                'title' => 'payment_status_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            61 => [
                'id' => 62,
                'title' => 'payment_status_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            62 => [
                'id' => 63,
                'title' => 'payment_status_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            63 => [
                'id' => 64,
                'title' => 'payment_method_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            64 => [
                'id' => 65,
                'title' => 'payment_method_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            65 => [
                'id' => 66,
                'title' => 'payment_method_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            66 => [
                'id' => 67,
                'title' => 'payment_method_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            67 => [
                'id' => 68,
                'title' => 'payment_method_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            68 => [
                'id' => 69,
                'title' => 'template_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            69 => [
                'id' => 70,
                'title' => 'template_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            70 => [
                'id' => 71,
                'title' => 'template_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            71 => [
                'id' => 72,
                'title' => 'template_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            72 => [
                'id' => 73,
                'title' => 'template_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            73 => [
                'id' => 74,
                'title' => 'mail_room_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            74 => [
                'id' => 75,
                'title' => 'campaign_result_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            75 => [
                'id' => 76,
                'title' => 'campaign_result_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            76 => [
                'id' => 77,
                'title' => 'campaign_result_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            77 => [
                'id' => 78,
                'title' => 'campaign_result_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            78 => [
                'id' => 79,
                'title' => 'campaign_result_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            79 => [
                'id' => 80,
                'title' => 'results_tracking_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            80 => [
                'id' => 81,
                'title' => 'results_tracking_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            81 => [
                'id' => 82,
                'title' => 'results_tracking_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            82 => [
                'id' => 83,
                'title' => 'results_tracking_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            83 => [
                'id' => 84,
                'title' => 'results_tracking_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            84 => [
                'id' => 85,
                'title' => 'campaign_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            85 => [
                'id' => 86,
                'title' => 'campaign_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            86 => [
                'id' => 87,
                'title' => 'campaign_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            87 => [
                'id' => 88,
                'title' => 'campaign_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            88 => [
                'id' => 89,
                'title' => 'campaign_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            89 => [
                'id' => 90,
                'title' => 'subscriber_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            90 => [
                'id' => 91,
                'title' => 'subscriber_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            91 => [
                'id' => 92,
                'title' => 'subscriber_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            92 => [
                'id' => 93,
                'title' => 'subscriber_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            93 => [
                'id' => 94,
                'title' => 'subscriber_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            94 => [
                'id' => 95,
                'title' => 'subscription_create',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            95 => [
                'id' => 96,
                'title' => 'subscription_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            96 => [
                'id' => 97,
                'title' => 'subscription_show',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            97 => [
                'id' => 98,
                'title' => 'subscription_delete',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            98 => [
                'id' => 99,
                'title' => 'subscription_access',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            99 => [
                'id' => 100,
                'title' => 'profile_password_edit',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            100 => [
                'id' => 101,
                'title' => 'payment_method_type_access',
                'created_at' => '2022-02-08 18:36:59',
                'updated_at' => '2022-02-08 18:36:59',
                'deleted_at' => null,
            ],
            101 => [
                'id' => 102,
                'title' => 'payment_method_type_create',
                'created_at' => '2022-02-08 18:37:05',
                'updated_at' => '2022-02-08 18:37:05',
                'deleted_at' => null,
            ],
            102 => [
                'id' => 103,
                'title' => 'payment_method_type_show',
                'created_at' => '2022-02-08 18:37:13',
                'updated_at' => '2022-02-08 18:37:13',
                'deleted_at' => null,
            ],
            103 => [
                'id' => 104,
                'title' => 'payment_method_type_edit',
                'created_at' => '2022-02-08 18:37:18',
                'updated_at' => '2022-02-08 18:37:18',
                'deleted_at' => null,
            ],
            104 => [
                'id' => 105,
                'title' => 'payment_method_type_delete',
                'created_at' => '2022-02-08 18:37:23',
                'updated_at' => '2022-02-08 18:37:23',
                'deleted_at' => null,
            ],
            105 => [
                'id' => 106,
                'title' => 'unsubscriber_show',
                'created_at' => '2022-02-25 12:35:48',
                'updated_at' => '2022-02-25 12:35:48',
                'deleted_at' => null,
            ],
            106 => [
                'id' => 107,
                'title' => 'unsubscriber_edit',
                'created_at' => '2022-02-25 12:35:53',
                'updated_at' => '2022-02-25 12:35:53',
                'deleted_at' => null,
            ],
            107 => [
                'id' => 108,
                'title' => 'unsubscriber_delete',
                'created_at' => '2022-02-25 12:35:58',
                'updated_at' => '2022-02-25 12:35:58',
                'deleted_at' => null,
            ],
            108 => [
                'id' => 109,
                'title' => 'only_admin',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            109 =>[
                'id'    => 110,
                'title' => 'task_management_access',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            110 =>[
                'id'    => 112,
                'title' => 'task_status_create',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            111 =>[
                'id'    => 113,
                'title' => 'task_status_edit',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            112 =>[
                'id'    => 114,
                'title' => 'task_status_show',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            113 =>[
                'id'    => 115,
                'title' => 'task_status_delete',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            114 =>[
                'id'    => 116,
                'title' => 'task_status_access',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            115 =>[
                'id'    => 117,
                'title' => 'task_tag_create',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            116 =>[
                'id'    => 118,
                'title' => 'task_tag_edit',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            117 =>[
                'id'    => 119,
                'title' => 'task_tag_show',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            118 =>[
                'id'    => 120,
                'title' => 'task_tag_delete',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            119 =>[
                'id'    => 121,
                'title' => 'task_tag_access',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            120 =>[
                'id'    => 122,
                'title' => 'task_create',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            121 =>[
                'id'    => 123,
                'title' => 'task_edit',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            122 =>[
                'id'    => 124,
                'title' => 'task_show',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            123 =>[
                'id'    => 125,
                'title' => 'task_delete',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            124 =>[
                'id'    => 126,
                'title' => 'task_access',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            125 =>[
                'id'    => 127,
                'title' => 'tasks_calendar_access',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
            126 =>[
                'id'    => 128,
                'title' => 'setting_access',
                'created_at' => '2022-03-15 13:36:39',
                'updated_at' => '2022-03-15 13:36:39',
                'deleted_at' => null,
            ],
        ]);
    }
}

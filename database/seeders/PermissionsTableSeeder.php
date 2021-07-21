<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'team_create',
            ],
            [
                'id'    => 18,
                'title' => 'team_edit',
            ],
            [
                'id'    => 19,
                'title' => 'team_show',
            ],
            [
                'id'    => 20,
                'title' => 'team_delete',
            ],
            [
                'id'    => 21,
                'title' => 'team_access',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 26,
                'title' => 'account_create',
            ],
            [
                'id'    => 27,
                'title' => 'account_edit',
            ],
            [
                'id'    => 28,
                'title' => 'account_show',
            ],
            [
                'id'    => 29,
                'title' => 'account_delete',
            ],
            [
                'id'    => 30,
                'title' => 'account_access',
            ],
            [
                'id'    => 31,
                'title' => 'offer_create',
            ],
            [
                'id'    => 32,
                'title' => 'offer_edit',
            ],
            [
                'id'    => 33,
                'title' => 'offer_show',
            ],
            [
                'id'    => 34,
                'title' => 'offer_delete',
            ],
            [
                'id'    => 35,
                'title' => 'offer_access',
            ],
            [
                'id'    => 36,
                'title' => 'mail_room_create',
            ],
            [
                'id'    => 37,
                'title' => 'mail_room_edit',
            ],
            [
                'id'    => 38,
                'title' => 'mail_room_show',
            ],
            [
                'id'    => 39,
                'title' => 'mail_room_delete',
            ],
            [
                'id'    => 40,
                'title' => 'mail_room_access',
            ],
            [
                'id'    => 41,
                'title' => 'template_create',
            ],
            [
                'id'    => 42,
                'title' => 'template_edit',
            ],
            [
                'id'    => 43,
                'title' => 'template_show',
            ],
            [
                'id'    => 44,
                'title' => 'template_delete',
            ],
            [
                'id'    => 45,
                'title' => 'template_access',
            ],
            [
                'id'    => 46,
                'title' => 'balance_create',
            ],
            [
                'id'    => 47,
                'title' => 'balance_edit',
            ],
            [
                'id'    => 48,
                'title' => 'balance_show',
            ],
            [
                'id'    => 49,
                'title' => 'balance_delete',
            ],
            [
                'id'    => 50,
                'title' => 'balance_access',
            ],
            [
                'id'    => 51,
                'title' => 'setting_access',
            ],
            [
                'id'    => 52,
                'title' => 'payment_status_create',
            ],
            [
                'id'    => 53,
                'title' => 'payment_status_edit',
            ],
            [
                'id'    => 54,
                'title' => 'payment_status_show',
            ],
            [
                'id'    => 55,
                'title' => 'payment_status_delete',
            ],
            [
                'id'    => 56,
                'title' => 'payment_status_access',
            ],
            [
                'id'    => 57,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 58,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 59,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 60,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 61,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 62,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 63,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 64,
                'title' => 'label_create',
            ],
            [
                'id'    => 65,
                'title' => 'label_edit',
            ],
            [
                'id'    => 66,
                'title' => 'label_show',
            ],
            [
                'id'    => 67,
                'title' => 'label_delete',
            ],
            [
                'id'    => 68,
                'title' => 'label_access',
            ],
            [
                'id'    => 69,
                'title' => 'affiliate_create',
            ],
            [
                'id'    => 70,
                'title' => 'affiliate_edit',
            ],
            [
                'id'    => 71,
                'title' => 'affiliate_show',
            ],
            [
                'id'    => 72,
                'title' => 'affiliate_delete',
            ],
            [
                'id'    => 73,
                'title' => 'affiliate_access',
            ],
            [
                'id'    => 74,
                'title' => 'advertiser_create',
            ],
            [
                'id'    => 75,
                'title' => 'advertiser_edit',
            ],
            [
                'id'    => 76,
                'title' => 'advertiser_show',
            ],
            [
                'id'    => 77,
                'title' => 'advertiser_delete',
            ],
            [
                'id'    => 78,
                'title' => 'advertiser_access',
            ],
            [
                'id'    => 79,
                'title' => 'account_status_create',
            ],
            [
                'id'    => 80,
                'title' => 'account_status_edit',
            ],
            [
                'id'    => 81,
                'title' => 'account_status_show',
            ],
            [
                'id'    => 82,
                'title' => 'account_status_delete',
            ],
            [
                'id'    => 83,
                'title' => 'account_status_access',
            ],
            [
                'id'    => 84,
                'title' => 'address_create',
            ],
            [
                'id'    => 85,
                'title' => 'address_edit',
            ],
            [
                'id'    => 86,
                'title' => 'address_show',
            ],
            [
                'id'    => 87,
                'title' => 'address_delete',
            ],
            [
                'id'    => 88,
                'title' => 'address_access',
            ],
            [
                'id'    => 89,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

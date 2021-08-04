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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 23,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 26,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 27,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 28,
                'title' => 'setting_access',
            ],
            [
                'id'    => 29,
                'title' => 'affiliate_create',
            ],
            [
                'id'    => 30,
                'title' => 'affiliate_edit',
            ],
            [
                'id'    => 31,
                'title' => 'affiliate_show',
            ],
            [
                'id'    => 32,
                'title' => 'affiliate_delete',
            ],
            [
                'id'    => 33,
                'title' => 'affiliate_access',
            ],
            [
                'id'    => 34,
                'title' => 'account_status_create',
            ],
            [
                'id'    => 35,
                'title' => 'account_status_edit',
            ],
            [
                'id'    => 36,
                'title' => 'account_status_show',
            ],
            [
                'id'    => 37,
                'title' => 'account_status_delete',
            ],
            [
                'id'    => 38,
                'title' => 'account_status_access',
            ],
            [
                'id'    => 39,
                'title' => 'advertiser_create',
            ],
            [
                'id'    => 40,
                'title' => 'advertiser_edit',
            ],
            [
                'id'    => 41,
                'title' => 'advertiser_show',
            ],
            [
                'id'    => 42,
                'title' => 'advertiser_delete',
            ],
            [
                'id'    => 43,
                'title' => 'advertiser_access',
            ],
            [
                'id'    => 44,
                'title' => 'label_create',
            ],
            [
                'id'    => 45,
                'title' => 'label_edit',
            ],
            [
                'id'    => 46,
                'title' => 'label_show',
            ],
            [
                'id'    => 47,
                'title' => 'label_delete',
            ],
            [
                'id'    => 48,
                'title' => 'label_access',
            ],
            [
                'id'    => 49,
                'title' => 'offer_create',
            ],
            [
                'id'    => 50,
                'title' => 'offer_edit',
            ],
            [
                'id'    => 51,
                'title' => 'offer_show',
            ],
            [
                'id'    => 52,
                'title' => 'offer_delete',
            ],
            [
                'id'    => 53,
                'title' => 'offer_access',
            ],
            [
                'id'    => 54,
                'title' => 'balance_create',
            ],
            [
                'id'    => 55,
                'title' => 'balance_edit',
            ],
            [
                'id'    => 56,
                'title' => 'balance_show',
            ],
            [
                'id'    => 57,
                'title' => 'balance_delete',
            ],
            [
                'id'    => 58,
                'title' => 'balance_access',
            ],
            [
                'id'    => 59,
                'title' => 'payment_status_create',
            ],
            [
                'id'    => 60,
                'title' => 'payment_status_edit',
            ],
            [
                'id'    => 61,
                'title' => 'payment_status_show',
            ],
            [
                'id'    => 62,
                'title' => 'payment_status_delete',
            ],
            [
                'id'    => 63,
                'title' => 'payment_status_access',
            ],
            [
                'id'    => 64,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 65,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 66,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 67,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 68,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 69,
                'title' => 'template_create',
            ],
            [
                'id'    => 70,
                'title' => 'template_edit',
            ],
            [
                'id'    => 71,
                'title' => 'template_show',
            ],
            [
                'id'    => 72,
                'title' => 'template_delete',
            ],
            [
                'id'    => 73,
                'title' => 'template_access',
            ],
            [
                'id'    => 74,
                'title' => 'mail_room_access',
            ],
            [
                'id'    => 75,
                'title' => 'mail_history_create',
            ],
            [
                'id'    => 76,
                'title' => 'mail_history_edit',
            ],
            [
                'id'    => 77,
                'title' => 'mail_history_show',
            ],
            [
                'id'    => 78,
                'title' => 'mail_history_delete',
            ],
            [
                'id'    => 79,
                'title' => 'mail_history_access',
            ],
            [
                'id'    => 80,
                'title' => 'opened_mail_create',
            ],
            [
                'id'    => 81,
                'title' => 'opened_mail_edit',
            ],
            [
                'id'    => 82,
                'title' => 'opened_mail_show',
            ],
            [
                'id'    => 83,
                'title' => 'opened_mail_delete',
            ],
            [
                'id'    => 84,
                'title' => 'opened_mail_access',
            ],
            [
                'id'    => 85,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

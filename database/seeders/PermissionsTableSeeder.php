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
                'title' => 'campaign_result_create',
            ],
            [
                'id'    => 76,
                'title' => 'campaign_result_edit',
            ],
            [
                'id'    => 77,
                'title' => 'campaign_result_show',
            ],
            [
                'id'    => 78,
                'title' => 'campaign_result_delete',
            ],
            [
                'id'    => 79,
                'title' => 'campaign_result_access',
            ],
            [
                'id'    => 80,
                'title' => 'results_tracking_create',
            ],
            [
                'id'    => 81,
                'title' => 'results_tracking_edit',
            ],
            [
                'id'    => 82,
                'title' => 'results_tracking_show',
            ],
            [
                'id'    => 83,
                'title' => 'results_tracking_delete',
            ],
            [
                'id'    => 84,
                'title' => 'results_tracking_access',
            ],
            [
                'id'    => 85,
                'title' => 'campaign_create',
            ],
            [
                'id'    => 86,
                'title' => 'campaign_edit',
            ],
            [
                'id'    => 87,
                'title' => 'campaign_show',
            ],
            [
                'id'    => 88,
                'title' => 'campaign_delete',
            ],
            [
                'id'    => 89,
                'title' => 'campaign_access',
            ],
            [
                'id'    => 90,
                'title' => 'subscriber_create',
            ],
            [
                'id'    => 91,
                'title' => 'subscriber_edit',
            ],
            [
                'id'    => 92,
                'title' => 'subscriber_show',
            ],
            [
                'id'    => 93,
                'title' => 'subscriber_delete',
            ],
            [
                'id'    => 94,
                'title' => 'subscriber_access',
            ],
            [
                'id'    => 95,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 96,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 97,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 98,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 99,
                'title' => 'subscription_access',
            ],
            ['id'    => 100, 'title' => 'task_management_access'],
            ['id'    => 101, 'title' => 'task_status_create'],
            ['id'    => 102, 'title' => 'task_status_edit'],
            ['id'    => 103, 'title' => 'task_status_show'],
            ['id'    => 104, 'title' => 'task_status_delete'],
            ['id'    => 105, 'title' => 'task_status_access'],
            ['id'    => 106, 'title' => 'task_tag_create'],
            ['id'    => 107, 'title' => 'task_tag_edit'],
            ['id'    => 108, 'title' => 'task_tag_show'],
            ['id'    => 109, 'title' => 'task_tag_delete'],
            ['id'    => 110, 'title' => 'task_tag_access'],
            ['id'    => 111, 'title' => 'task_create'],
            ['id'    => 112, 'title' => 'task_edit'],
            ['id'    => 113, 'title' => 'task_show'],
            ['id'    => 114, 'title' => 'task_delete'],
            ['id'    => 115, 'title' => 'task_access'],
            ['id'    => 116, 'title' => 'tasks_calendar_access'],
            [
                'id'    => 117,
                'title' => 'profile_password_edit',
            ],
            ['id'    => 118, 'title' => 'tools_access'],
            ['id'    => 119, 'title' => 'only_admin'],
        ];

        Permission::insert($permissions);
    }
}

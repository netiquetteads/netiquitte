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
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

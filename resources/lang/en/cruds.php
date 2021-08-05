<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'team'                     => 'Team',
            'team_helper'              => ' ',
            'linkedin'                 => 'Linkedin',
            'linkedin_helper'          => ' ',
            'skype'                    => 'Skype',
            'skype_helper'             => ' ',
        ],
    ],
    'team' => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'affiliate' => [
        'title'          => 'Affiliates',
        'title_singular' => 'Affiliate',
        'all' => 'All',
        'active' => 'Active',
        'inactive' => 'Inactive',
        'suspended' => 'Suspended',
=======
    'account' => [
        'title'          => 'Accounts',
        'title_singular' => 'Account',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'account' => [
        'title'          => 'Accounts',
        'title_singular' => 'Account',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'account' => [
        'title'          => 'Accounts',
        'title_singular' => 'Account',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'account' => [
        'title'          => 'Accounts',
        'title_singular' => 'Account',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'company'                 => 'Company Name',
            'company_helper'          => ' ',
            'account_status'          => 'Account Status',
            'account_status_helper'   => ' ',
            'published'               => 'Published',
            'published_helper'        => ' ',
            'users'                   => 'Users',
            'users_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'team'                    => 'Team',
            'team_helper'             => ' ',
            'everflow_account'        => 'Everflow Account ID',
            'everflow_account_helper' => ' ',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'accountStatus' => [
        'title'          => 'Account Status',
        'title_singular' => 'Account Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'advertiser' => [
        'title'          => 'Advertisers',
        'title_singular' => 'Advertiser',
        'pending' => 'Pending',
        'active' => 'Active',
        'inactive' => 'Inactive',
        'suspended' => 'Suspended',
=======
    'offer' => [
        'title'          => 'Offers',
        'title_singular' => 'Offer',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'offer' => [
        'title'          => 'Offers',
        'title_singular' => 'Offer',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'offer' => [
        'title'          => 'Offers',
        'title_singular' => 'Offer',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'offer' => [
        'title'          => 'Offers',
        'title_singular' => 'Offer',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'preview_url'         => 'Preview Url',
            'preview_url_helper'  => ' ',
            'source'              => 'Source',
            'source_helper'       => ' ',
            'payout'              => 'Payout',
            'payout_helper'       => ' ',
            'revenue'             => 'Revenue',
            'revenue_helper'      => ' ',
            'offer_status'        => 'Status',
            'offer_status_helper' => ' ',
            'margin'              => 'Margin',
            'margin_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'mailRoom' => [
        'title'          => 'Mail Room',
        'title_singular' => 'Mail Room',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'team'              => 'Team',
            'team_helper'       => ' ',
            'template'          => 'Template To Use',
            'template_helper'   => ' ',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'offer' => [
        'title'          => 'Offers',
        'title_singular' => 'Offer',
        'all' => 'All',
        'active' => 'Active',
        'paused' => 'Paused',
        'pending' => 'Pending',
        'deleted' => 'Deleted',
=======
    'template' => [
        'title'          => 'Template',
        'title_singular' => 'Template',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'template' => [
        'title'          => 'Template',
        'title_singular' => 'Template',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'template' => [
        'title'          => 'Template',
        'title_singular' => 'Template',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
    'template' => [
        'title'          => 'Template',
        'title_singular' => 'Template',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'email_subject'        => 'Email Subject',
            'email_subject_helper' => ' ',
            'from_email'           => 'From Email',
            'from_email_helper'    => ' ',
            'content'              => 'Content',
            'content_helper'       => ' ',
            'offer_image'          => 'Offer Image',
            'offer_image_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'balance' => [
        'title'          => 'Balances',
        'title_singular' => 'Balance',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'revenue'                => 'Revenue',
            'revenue_helper'         => ' ',
            'payout'                 => 'Payout',
            'payout_helper'          => ' ',
            'profit'                 => 'Profit',
            'profit_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'publisher_notes'        => 'Publisher Notes',
            'publisher_notes_helper' => ' ',
            'company_name'           => 'Company Name',
            'company_name_helper'    => ' ',
            'payment_status'         => 'Payment Status',
            'payment_status_helper'  => ' ',
            'payment_method'         => 'Payment Method',
            'payment_method_helper'  => ' ',
            'team'                   => 'Team',
            'team_helper'            => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'paymentStatus' => [
        'title'          => 'Payment Status',
        'title_singular' => 'Payment Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'paymentMethod' => [
        'title'          => 'Payment Method',
        'title_singular' => 'Payment Method',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'account_name'          => 'Account Name',
            'account_name_helper'   => ' ',
            'account_number'        => 'Account Number',
            'account_number_helper' => ' ',
            'routing_number'        => 'Routing Number',
            'routing_number_helper' => ' ',
            'swift'                 => 'SWIFT',
            'swift_helper'          => ' ',
            'paypal_email'          => 'Paypal Email',
            'paypal_email_helper'   => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        ],
    ],
    'mailRoom' => [
        'title'          => 'Mail Room',
        'title_singular' => 'Mail Room',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'tool' => [
        'title'          => 'Tools',
        'title_singular' => 'Tools',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'template' => [
        'title'          => 'Templates',
        'title_singular' => 'Template',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'email_subject'        => 'Email Subject',
            'email_subject_helper' => ' ',
            'from_email'           => 'From Email',
            'from_email_helper'    => ' ',
            'content'              => 'Content',
            'content_helper'       => ' ',
            'offer_image'          => 'Offer Image',
            'offer_image_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
=======
            'team'                  => 'Team',
            'team_helper'           => ' ',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
            'team'                  => 'Team',
            'team_helper'           => ' ',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
            'team'                  => 'Team',
            'team_helper'           => ' ',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
            'team'                  => 'Team',
            'team_helper'           => ' ',
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
        ],
    ],
];

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
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
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
        'fields'         => [
            'id'                                => 'ID',
            'id_helper'                         => ' ',
            'logo'                              => 'Logo',
            'logo_helper'                       => ' ',
            'name'                              => 'Name',
            'name_helper'                       => ' ',
            'everflow_account'                  => 'Everflow Account ID',
            'everflow_account_helper'           => ' ',
            'featured_image'                    => 'Featured Image',
            'featured_image_helper'             => ' ',
            'account_manager_name'              => 'Account Manager Name',
            'account_manager_name_helper'       => ' ',
            'account_executive_name'            => 'Account Executive Name',
            'account_executive_name_helper'     => ' ',
            'balance'                           => 'Balance',
            'balance_helper'                    => ' ',
            'last_login'                        => 'Last Login',
            'last_login_helper'                 => ' ',
            'network_country_code'              => 'Network Country Code',
            'network_country_code_helper'       => ' ',
            'global_tracking_domain_url'        => 'Global Tracking Domain Url',
            'global_tracking_domain_url_helper' => ' ',
            'published'                         => 'Published',
            'published_helper'                  => ' ',
            'today_revenue'                     => 'Today Revenue',
            'today_revenue_helper'              => ' ',
            'network_affiliateid'               => 'Network Affiliate ID',
            'network_affiliateid_helper'        => ' ',
            'account_executiveid'               => 'Account Executive ID',
            'account_executiveid_helper'        => ' ',
            'account_managerid'                 => 'Account Manager ID',
            'account_managerid_helper'          => ' ',
            'networkid'                         => 'Network ID',
            'networkid_helper'                  => ' ',
            'created_at'                        => 'Created at',
            'created_at_helper'                 => ' ',
            'updated_at'                        => 'Updated at',
            'updated_at_helper'                 => ' ',
            'deleted_at'                        => 'Deleted at',
            'deleted_at_helper'                 => ' ',
            'team'                              => 'Team',
            'team_helper'                       => ' ',
            'account_status'                    => 'Account Status',
            'account_status_helper'             => ' ',
        ],
    ],
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
        'fields'         => [
            'id'                                        => 'ID',
            'id_helper'                                 => ' ',
            'name'                                      => 'Name',
            'name_helper'                               => ' ',
            'account_status'                            => 'Account Status',
            'account_status_helper'                     => ' ',
            'everflow_account'                          => 'Everflow Account ID',
            'everflow_account_helper'                   => ' ',
            'featured_image'                            => 'Featured Image',
            'featured_image_helper'                     => ' ',
            'account_manager_name'                      => 'Account Manager Name',
            'account_manager_name_helper'               => ' ',
            'account_executive_name'                    => 'Account Executive Name',
            'account_executive_name_helper'             => ' ',
            'balance'                                   => 'Balance',
            'balance_helper'                            => ' ',
            'last_login'                                => 'Last Login',
            'last_login_helper'                         => ' ',
            'network_country_code'                      => 'Network Country Code',
            'network_country_code_helper'               => ' ',
            'global_tracking_domain_url'                => 'Global Tracking Domain Url',
            'global_tracking_domain_url_helper'         => ' ',
            'published'                                 => 'Published',
            'published_helper'                          => ' ',
            'network_affiliateid'                       => 'Network Affiliate ID',
            'network_affiliateid_helper'                => ' ',
            'account_executiveid'                       => 'Account Executive ID',
            'account_executiveid_helper'                => ' ',
            'account_managerid'                         => 'Account Manager ID',
            'account_managerid_helper'                  => ' ',
            'networkid'                                 => 'Network ID',
            'networkid_helper'                          => ' ',
            'network_employeeid'                        => 'Network Employee ID',
            'network_employeeid_helper'                 => ' ',
            'internal_notes'                            => 'Internal Notes',
            'internal_notes_helper'                     => ' ',
            'is_contact_address_enabled'                => 'Is Contact Address Enabled',
            'is_contact_address_enabled_helper'         => ' ',
            'sales_managerid'                           => 'Sales ManagerID',
            'sales_managerid_helper'                    => ' ',
            'is_expose_publisher_reporting_data'        => 'Expose Publisher Reporting Data',
            'is_expose_publisher_reporting_data_helper' => ' ',
            'platform_name'                             => 'Platform Name',
            'platform_name_helper'                      => ' ',
            'platform_url'                              => 'Platform Url',
            'platform_url_helper'                       => ' ',
            'platform_username'                         => 'Platform Username',
            'platform_username_helper'                  => ' ',
            'accounting_contact_email'                  => 'Accounting Contact Email',
            'accounting_contact_email_helper'           => ' ',
            'offer_id_macro'                            => 'Offer Id Macro',
            'offer_id_macro_helper'                     => ' ',
            'affiliate_id_macro'                        => 'Affiliate Id Macro',
            'affiliate_id_macro_helper'                 => ' ',
            'attribution_method'                        => 'Attribution Method',
            'attribution_method_helper'                 => ' ',
            'email_attribution_method'                  => 'Email Attribution Method',
            'email_attribution_method_helper'           => ' ',
            'network_advertiserid'                      => 'Network Advertiser ID',
            'network_advertiserid_helper'               => ' ',
            'created_at'                                => 'Created at',
            'created_at_helper'                         => ' ',
            'updated_at'                                => 'Updated at',
            'updated_at_helper'                         => ' ',
            'deleted_at'                                => 'Deleted at',
            'deleted_at_helper'                         => ' ',
            'sales_manager_name'                        => 'Sales Manager Name',
            'sales_manager_name_helper'                 => ' ',
            'today_revenue'                             => 'Today Revenue',
            'today_revenue_helper'                      => ' ',
        ],
    ],
    'label' => [
        'title'          => 'Labels',
        'title_singular' => 'Label',
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
    'offer' => [
        'title'          => 'Offers',
        'title_singular' => 'Offer',
        'all' => 'All',
        'active' => 'Active',
        'paused' => 'Paused',
        'pending' => 'Pending',
        'deleted' => 'Deleted',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'name'                           => 'Name',
            'name_helper'                    => ' ',
            'preview_url'                    => 'Preview Url',
            'preview_url_helper'             => ' ',
            'source'                         => 'Source',
            'source_helper'                  => ' ',
            'payout'                         => 'Payout',
            'payout_helper'                  => ' ',
            'revenue'                        => 'Revenue',
            'revenue_helper'                 => ' ',
            'offer_status'                   => 'Status',
            'offer_status_helper'            => ' ',
            'margin'                         => 'Margin',
            'margin_helper'                  => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
            'affiliate'                      => 'Affiliate',
            'affiliate_helper'               => ' ',
            'network_offer'                  => 'Network Offer',
            'network_offer_helper'           => ' ',
            'network'                        => 'Network',
            'network_helper'                 => ' ',
            'optimized_thumbnail_url'        => 'Optimized Thumbnail Url',
            'optimized_thumbnail_url_helper' => ' ',
            'thumbnail_url'                  => 'Thumbnail Url',
            'thumbnail_url_helper'           => ' ',
            'visibility'                     => 'Visibility',
            'visibility_helper'              => ' ',
            'network_advertiser_name'        => 'Network Advertiser Name',
            'network_advertiser_name_helper' => ' ',
            'category'                       => 'Category',
            'category_helper'                => ' ',
            'network_offer_group'            => 'Network Offer Group',
            'network_offer_group_helper'     => ' ',
            'time_created'                   => 'Time Created',
            'time_created_helper'            => ' ',
            'time_saved'                     => 'Time Saved',
            'time_saved_helper'              => ' ',
            'today_revenue'                  => 'Today Revenue',
            'today_revenue_helper'           => ' ',
            'destination_url'                => 'Destination Url',
            'destination_url_helper'         => ' ',
            'today_clicks'                   => 'Today Clicks',
            'today_clicks_helper'            => ' ',
            'revenue_type'                   => 'Revenue Type',
            'revenue_type_helper'            => ' ',
            'payout_type'                    => 'Payout Type',
            'payout_type_helper'             => ' ',
            'today_payout_amount'            => 'Today Payout Amount',
            'today_payout_amount_helper'     => ' ',
            'today_revenue_amount'           => 'Today Revenue Amount',
            'today_revenue_amount_helper'    => ' ',
            'payout_amount'                  => 'Payout Amount',
            'payout_amount_helper'           => ' ',
            'revenue_amount'                 => 'Revenue Amount',
            'revenue_amount_helper'          => ' ',
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
            'publisher_notes'        => 'Publisher Notes',
            'publisher_notes_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'payment_method'         => 'Payment Method',
            'payment_method_helper'  => ' ',
            'payment_status'         => 'Payment Status',
            'payment_status_helper'  => ' ',
        ],
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
        'title'          => 'Payment Methods',
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
        ],
    ],
];

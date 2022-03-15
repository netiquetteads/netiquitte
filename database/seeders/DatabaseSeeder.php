<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(UsersTableSeeder::class);

        $this->call(PermissionsTableSeeder::class);

        $this->call(RolesTableSeeder::class);

        $this->call(AccountsTableSeeder::class);

        $this->call(AdvertisersTableSeeder::class);

        $this->call(BalancesTableSeeder::class);

        Schema::disableForeignKeyConstraints();

        $this->call(AccountStatusesTableSeeder::class);

        $this->call(AffiliatesTableSeeder::class);

        $this->call(BalanceContainerTableSeeder::class);

        $this->call(CampaignOffersTableSeeder::class);

        $this->call(CampaignResultsTableSeeder::class);

        $this->call(CampaignsTableSeeder::class);

        $this->call(JobsTableSeeder::class);

        $this->call(LabelsTableSeeder::class);

        $this->call(MediaTableSeeder::class);

        $this->call(OffersTableSeeder::class);

        $this->call(PaymentMethodsTableSeeder::class);

        $this->call(PaymentStatusesTableSeeder::class);

        $this->call(PersonalAccessTokensTableSeeder::class);

        $this->call(QaMessagesTableSeeder::class);

        $this->call(QaTopicsTableSeeder::class);

        $this->call(ResultsTrackingsTableSeeder::class);

        $this->call(SubscribersTableSeeder::class);

        $this->call(SubscriptionsTableSeeder::class);

        $this->call(TeamsTableSeeder::class);

        $this->call(TemplateOffersTableSeeder::class);

        $this->call(TemplatesTableSeeder::class);

        $this->call(UserAlertsTableSeeder::class);

        $this->call(UserUserAlertTableSeeder::class);

        $this->call(RoleUserTableSeeder::class);

        $this->call(PermissionRoleTableSeeder::class);

        $this->call(PaymentMailLogsTableSeeder::class);

        $this->call(PaymentMethodTypeTableSeeder::class);

        $this->call(RoleUserAlertTableSeeder::class);

        $this->call(TeamUserAlertTableSeeder::class);

        $this->call(TempEmailsTableSeeder::class);

        $this->call(UnsubscribersTableSeeder::class);

        $this->call(TaskStatusesTableSeeder::class);

        $this->call(TaskTagsTableSeeder::class);

        $this->call(TaskTaskTagTableSeeder::class);

        $this->call(TasksTableSeeder::class);
    }
}

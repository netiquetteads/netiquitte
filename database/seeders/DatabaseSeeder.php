<?php

namespace Database\Seeders;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
 
$this->call(UsersTableSeeder::class);

$this->call(RolesTableSeeder::class);
$this->call(PermissionsTableSeeder::class);          
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
        Schema::disableForeignKeyConstraints();
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(QaMessagesTableSeeder::class);
        $this->call(QaTopicsTableSeeder::class);
        $this->call(ResultsTrackingsTableSeeder::class);
        Schema::disableForeignKeyConstraints();
        $this->call(SubscribersTableSeeder::class);
        $this->call(SubscriptionsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TemplateOffersTableSeeder::class);
        $this->call(TemplatesTableSeeder::class);
        Schema::disableForeignKeyConstraints();
        $this->call(UserAlertsTableSeeder::class);
        $this->call(UserUserAlertTableSeeder::class);
        Schema::disableForeignKeyConstraints();
        $this->call(RoleUserTableSeeder::class);
        Schema::disableForeignKeyConstraints();
        $this->call(PermissionRoleTableSeeder::class);
    }
}

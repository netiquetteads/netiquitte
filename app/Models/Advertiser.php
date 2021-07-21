<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Advertiser extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const ACCOUNT_STATUS_SELECT = [
        '1' => 'Active',
        '2' => 'Inactive',
    ];

    public $table = 'advertisers';

    protected $appends = [
        'featured_image',
    ];

    protected $dates = [
        'created_at',
        'last_login',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'account_status',
        'created_at',
        'everflow_account',
        'account_manager_name',
        'account_executive_name',
        'balance',
        'last_login',
        'network_country_code',
        'global_tracking_domain_url',
        'published',
        'today_revenue',
        'network_affiliateid',
        'account_executiveid',
        'account_managerid',
        'networkid',
        'network_employeeid',
        'internal_notes',
        'is_contact_address_enabled',
        'sales_managerid',
        'is_expose_publisher_reporting_data',
        'platform_name',
        'platform_url',
        'platform_username',
        'accounting_contact_email',
        'offer_id_macro',
        'affiliate_id_macro',
        'attribution_method',
        'email_attribution_method',
        'network_advertiserid',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getLastLoginAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setLastLoginAttribute($value)
    {
        $this->attributes['last_login'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

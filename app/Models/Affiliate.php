<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Affiliate extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public $table = 'affiliates';

    protected $with = ['accounts', 'media'];

    protected $appends = [
        'logo',
        'featured_image',
    ];

    protected $dates = [
        'last_login',
        'time_created',
        'time_saved',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'account_status_id',
        'account_status',
        'name',
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
        'time_created',
        'time_saved',
        'networkid',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
        'w8',
        'w9',
    ];

    public function scopePublished($query)
    {
        // $affiliates = Affiliate::published()->get();
        // $affiliates = Affiliate::published()->count();
        return $query->where('published', 1);
    }

    public function scopeIsActive($query)
    {
        //$affiliates = Affiliate::isActive()->count();
        //$affiliates = Affiliate::isActive()->get();
        // $affiliates = Affiliate::isActive()->find('3');
        return $query->where('account_status', 'active');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    // public function account_status()
    // {
    //     return $this->belongsTo(AccountStatus::class, 'account_status_id');
    // }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getLastLoginAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format').' '.config('panel.time_format')) : null;
    }

    public function setLastLoginAttribute($value)
    {
        $this->attributes['last_login'] = $value ? Carbon::createFromFormat(config('panel.date_format').' '.config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function Accounts()
    {
        return $this->belongsTo(Account::class, 'id', 'PlatformUserID');
    }
}

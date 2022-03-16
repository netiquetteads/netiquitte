<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Campaign extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public $table = 'campaigns';

    protected $appends = [
        'offer_image',
        'sent_date',
        'sent_time',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email_subject',
        'from_email',
        'content',
        // 'campaign_offer_id',
        'selected_template_id',
        'subs',
        'unsubs',
        'opens',
        'send_to',
        'unopened',
        'total_emails_sent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getOfferImageAttribute()
    {
        $file = $this->getMedia('offer_image')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getSentDateAttribute()
    {
        $date = date('d-m-Y', strtotime($this->created_at));

        return $date;
    }

    public function getSentTimeAttribute()
    {
        $date = date('h:i:s a', strtotime($this->created_at));

        return $date;
    }

    public function campaign_offer()
    {
        return $this->belongsTo(Offer::class, 'campaign_offer_id');
    }

    public function campaignOffers()
    {
        return $this->belongsToMany(Offer::class, 'campaign_offers');
    }

    public function selected_template()
    {
        return $this->belongsTo(Template::class, 'selected_template_id');
    }

    public function tempEmails()
    {
        return $this->hasMany(TempEmail::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

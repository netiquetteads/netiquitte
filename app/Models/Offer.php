<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const SOURCE_SELECT = [
        '1' => 'Everflow',
    ];

    public const OFFER_STATUS_SELECT = [
        'active' => 'Active',
        'paused' => 'Paused',
        'pending' => 'Pending',
        'deleted' => 'Deleted',
    ];

    public $table = 'offers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'preview_url',
        'source',
        'payout',
        'revenue',
        'offer_status',
        'margin',
        'affiliate_id',
        'network_offer',
        'network',
        'optimized_thumbnail_url',
        'thumbnail_url',
        'visibility',
        'network_advertiser_name',
        'category',
        'network_offer_group',
        'time_created',
        'time_saved',
        'today_revenue',
        'destination_url',
        'today_clicks',
        'revenue_type',
        'payout_type',
        'today_payout_amount',
        'today_revenue_amount',
        'payout_amount',
        'revenue_amount',
        'countries',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class, 'affiliate_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

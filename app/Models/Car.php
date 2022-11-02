<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',
        'brand',
        'brand_en',
        'brand_h1',
        'brand_h1_en',
        'url',
        'year',
        'car_with_driver',
        'car_without_driver',
        'passenger_seats',
        'length',
        'weight',
        'width',
        'maximum_speed',
        'height',
        'trunk',
        'power',
        'engine_volume',
        'acceleration_time',
        'peculiarities',
        'description',
        'peculiarities_en',
        'description_en',
        'preview',
        'preview_main',
        'video_url',
        'gallery',
        'enabled_video',
        'price_with_driver',
        /*'car_feed',*/
        'rate_without_driver',
        'seo_description',
        'seo_tags',
        'seo_title',
        'seo_description_en',
        'seo_title_en',
        'active',
        'transfer',
        'pledge',
        'price_with_driver_en',
        'transfer_en',
        'position'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

}

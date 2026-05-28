<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'price' => 'decimal:0',
        'benefits' => 'array',
        'steps' => 'array',
        'requirements' => 'array',
        'faq_items' => 'array',
    ];

    protected $appends = [
        'thumbnail_url',
        'banner_url',
    ];

    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail_image) {
            return str_starts_with($this->thumbnail_image, 'http')
                ? $this->thumbnail_image
                : asset('storage/' . ltrim($this->thumbnail_image, '/'));
        }

        return asset('images/logo_aka.png');
    }

    public function getBannerUrlAttribute(): string
    {
        if ($this->banner_image) {
            return str_starts_with($this->banner_image, 'http')
                ? $this->banner_image
                : asset('storage/' . ltrim($this->banner_image, '/'));
        }

        return $this->thumbnail_url;
    }

    protected static function booted()
    {
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('home_services_v2');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('home_services_v2');
        });
    }
}
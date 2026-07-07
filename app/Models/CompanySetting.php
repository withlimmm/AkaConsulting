<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'whatsapp_admins' => 'array',
    ];

    public function getMottoAttribute($value)
    {
        if (empty($value)) return [];
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return is_array($decoded) ? $decoded : [$decoded];
        }
        return [$value];
    }

    public function setMottoAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['motto'] = json_encode(array_values(array_filter($value, fn($v) => !empty(trim($v)))));
        } else {
            $this->attributes['motto'] = json_encode([$value]);
        }
    }
}
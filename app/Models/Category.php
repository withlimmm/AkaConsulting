<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Accessor: Jika nama kategori tersimpan sebagai JSON bilingual,
     * kembalikan versi bahasa Indonesia (key 'id').
     */
    public function getNameAttribute($value)
    {
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded['id'] ?? $decoded['en'] ?? $value;
        }
        return $value;
    }

    public function articles()
    {
        return $this->hasMany(Article::class)->withTrashed();
    }

    // Relasi: Satu kategori punya banyak portfolio
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
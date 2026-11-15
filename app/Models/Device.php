<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Device extends Model
{
    use HasFactory;

    protected $table = 'devices';
    protected $primaryKey = 'id_device';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_device',
        'id_category',
        'id_merk',
        'model'
    ];

    // Otomatis generate string unik untuk id_device saat data dibuat
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id_device)) {
                $model->id_device = (string) Str::uuid();
            }
        });
    }

    // Relasi ke tabel kategori dan merk
    public function category() {
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }

    public function merk() {
        return $this->belongsTo(Merk::class, 'id_merk', 'id_merk');
    }
}

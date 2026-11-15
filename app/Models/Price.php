<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Price extends Model
{
    use HasFactory;

    protected $table = 'prices';
    protected $primaryKey = 'id_price';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_price',
        'deskripsi',
        'nominal_harga'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id_price)) {
                $model->id_price = (string) Str::uuid();
            }
        });
    }
}
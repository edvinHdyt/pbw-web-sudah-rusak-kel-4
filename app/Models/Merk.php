<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Merk extends Model
{
    protected $table = 'merks';
    protected $primaryKey = 'id_merk';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_merk',
        'merk'
    ];

     protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id_merk)) {
                $model->id_merk = Str::random(20); }
        });
    }

    public function devices() {
        return $this->hasMany(Device::class, 'id_merk', 'id_merk'); }


}
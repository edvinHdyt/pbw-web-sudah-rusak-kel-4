<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Status extends Model {
    use HasUuids;
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'status',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}

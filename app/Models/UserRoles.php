<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class UserRoles extends Pivot {
    use HasUuids;
    protected $table = 'user_roles';
    protected $primaryKey = 'id_user_role';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = [
        'id_user',
        'id_role',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_user'
        );
    }

    public function role(): BelongsTo {
        return $this->belongsTo(
            Roles::class,
            'id_role',
            'id_role'
        );
    }
}

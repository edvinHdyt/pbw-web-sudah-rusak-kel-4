<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Roles extends Model {
    use HasUuids;
    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_role',
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(
            User::class,
            'users_roles',
            'id_role',
            'id_user'
        )
        ->using(UserRole::class)
        ->withPivot('id_user_role')
        ->withTimestamps();
    }
}

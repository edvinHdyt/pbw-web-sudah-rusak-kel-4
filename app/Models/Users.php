<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\Users as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable implements MustVerifyEmail {
    use HasFactory, Notifiable, HasUuids;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telpon',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles(): BelongsToMany {
        return $this->belongsToMany(
            Role::class,
            'users_roles',
            'id_user',
            'id_role'
        )
        ->using(Users_Roles::class)
        ->withPivot('id_user_role')
        ->withTimestamps();
    }

    public function hasRole(string $role): bool {
        return $this->roles()
            ->where('nama_role', $role)
            ->exists();
    }

    public function hasAnyRole(array $roles): bool {
        return $this->roles()
            ->whereIn('nama_role', $roles)
            ->exists();
    }
}

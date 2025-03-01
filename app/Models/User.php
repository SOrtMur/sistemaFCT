<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'surname1',
        'teacher_id',
        'tutor_id'
    ];

    public function actions(): HasMany{
        return $this->hasMany(Action::class);
    }

    public function user(): HasOne{
        return $this->hasOne(User::class);
    }

    public function teacher(): BelongsTo{
        return $this->belongsTo(User::class,"teacher_id");
    }

    public function tutor(): BelongsTo{
        return $this->belongsTo(User::class,"tutor_id");
    }

    public function role(): BelongsToMany{
        return $this->belongsToMany(Role::class, 'companies_roles_users');
    }

    public function company(): BelongsToMany{
        return $this->belongsToMany(Company::class, 'companies_roles_users');
    }
}

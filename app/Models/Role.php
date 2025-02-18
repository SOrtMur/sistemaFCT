<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function user(): BelongsToMany{
        return $this->belongsToMany(User::class, 'companies_roles_users');
    }

    public function company(): BelongsToMany{
        return $this->belongsToMany(Company::class, 'companies_roles_users');
    }
}

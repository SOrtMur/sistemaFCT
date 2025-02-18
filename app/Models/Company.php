<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact_email',
        'phone',
        'cif',
    ];

    public function role(): BelongsToMany{
        return $this->belongsToMany(Role::class, 'companies_roles_users');
    }

    public function user(): BelongsToMany{
        return $this->belongsToMany(User::class, 'companies_roles_users');
    }
}

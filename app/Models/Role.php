<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    const ADMIN = 'Admin';
    const MANAGER = 'Manager';
    const USER = 'User';

    use HasFactory;

    /**
     * Получить сотрудников с этой ролью. (один ко многим)
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}

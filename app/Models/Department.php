<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    /**
     * Пользователи, принадлежащие отделу
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\Users');
    }
}

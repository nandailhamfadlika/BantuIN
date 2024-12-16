<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Helper extends Authenticatable
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'helper_id',
        'name',
        'phone',
        'nik',
        'password',
    ];

    /**
     * Relationships.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

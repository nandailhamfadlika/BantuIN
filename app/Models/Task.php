<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'user_id',
        'name',
        'task_name',
        'task_description',
        'task_time_range',
        'location',
        'price_range',
        'status',
        'helper_id',
    ];

    /**
     * Relationships.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function helper()
    {
        return $this->belongsTo(Helper::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}

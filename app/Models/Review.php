<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'user_id',
        'helper_id',
        'task_id',
        'rating',
        'agreed_price',
        'review_description',
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

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}

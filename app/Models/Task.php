<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task', 'complete', 'user_id'
    ];

    /**
     * Get the user of task.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}

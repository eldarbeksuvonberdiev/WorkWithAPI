<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class, 'task_id');
    }
}

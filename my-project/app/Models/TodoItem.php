<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    //
    protected $fillable = ['title', 'description', 'done', 'user_id'];

    protected $casts = [
        'done' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

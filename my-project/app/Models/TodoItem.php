<?php

namespace App\Models;

use App\Models\itemCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    //
    protected $fillable = ['title', 'description', 'done', 'user_id', 'category'];

    protected $casts = [
        'done' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(itemCategory::class);
    }
    
}

<?php

namespace App\Models;

use App\Models\TodoItem;
use Illuminate\Database\Eloquent\Model;

class itemCategory extends Model
{
    protected $fillable = [
        'name',
    ];


    public function itemCategory()
    {
        return $this->hasMany(TodoItem::class, 'category_id');
    }
}

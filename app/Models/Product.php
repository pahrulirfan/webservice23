<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'category_id'];
    // protected $hidden = ['created_at'];

    function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
        // select * from product join category on category.id=product.category_id
    }

}

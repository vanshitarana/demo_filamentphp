<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class sub_categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id' ,'category_name', 'slug', 'meta_title', 'meta_description','meta_keywords'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}

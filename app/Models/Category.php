<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sub_categories;

class Category extends Model
{
    use HasFactory;

    
    protected $fillable = ['title','categorie_name','slug'];


    public function subCategories()
    {
        return $this->hasMany(sub_categories::class);
    }
}

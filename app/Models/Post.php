<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'subtitle',
        'content'
    ];

    /**
     * Get the Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

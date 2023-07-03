<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function countByCategoryId($categoryId)
    {
        return self::where('category_id', $categoryId)->count();
    }

    public function getSoftDeletedPosts()
    {
        return self::onlyTrashed()->get();
    }
}

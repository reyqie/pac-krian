<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';
    protected $fillable = [
        'title',
        'content',
        'date_event',
    ];

    public function galleryNews()
    {
        return $this->hasMany(GalleryNews::class, 'news_id');
    }
}

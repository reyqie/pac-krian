<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryNews extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gallery_news';
    protected $fillable = [
        'news_id',
        'url',
    ];

    public function news()
    {
        $this->belongsTo(News::class, 'news_id');
    }
}

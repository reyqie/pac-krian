<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryIppnu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gallery_ippnu';
    protected $fillable = [
        'ippnu_id',
        'url',
    ];

    public function ippnu()
    {
        $this->belongsTo(Ippnu::class, 'ippnu_id');
    }
}

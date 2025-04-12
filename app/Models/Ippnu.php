<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ippnu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ippnu';
    protected $fillable = [
        'name',
        'position',
        'born',
        'address',
        'periode1',
        'periode2'
    ];

    public function galleryIppnus()
    {
        return $this->hasMany(GalleryIppnu::class, 'ippnu_id');
    }
}

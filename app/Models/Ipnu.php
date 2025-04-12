<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ipnu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ipnu';
    protected $fillable = [
        'name',
        'position',
        'born',
        'address',
        'periode1',
        'periode2'
    ];

    public function galleryIpnus()
    {
        return $this->hasMany(GalleryIpnu::class, 'ipnu_id');
    }
}

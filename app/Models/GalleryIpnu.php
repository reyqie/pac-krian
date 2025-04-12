<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryIpnu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gallery_ipnu';
    protected $fillable = [
        'ipnu_id',
        'url',
    ];

    public function ipnu()
    {
        $this->belongsTo(Ipnu::class, 'ipnu_id');
    }
}

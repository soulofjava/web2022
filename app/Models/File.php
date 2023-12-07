<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function galeri()
    {
        return $this->belongsTo(Gallery::class, 'id', 'id_news');
    }
}

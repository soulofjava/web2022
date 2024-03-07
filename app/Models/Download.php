<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(DownloadAreaFile::class, 'download_area_id', 'id');
    }

    public function usernya()
    {
        return $this->belongsTo(User::class, 'upload_by', 'id');
    }
}

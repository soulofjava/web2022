<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class News extends Model implements Viewable
{
    use HasFactory, SoftDeletes, InteractsWithViews, Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getDescriptionAttribute($value)
    {
        $substring = url('/') . '/storage/';
        
        if (Str::contains($value, $substring)) {
            $newValue = str_replace(url('/') . '/storage/', url('show-picture?path='), $value);
            return $newValue;
        }

        return $value;
    }

    public function gambar()
    {
        return $this->hasMany(File::class, 'id_news', 'id');
    }

    public function gambarmuka()
    {
        return $this->hasOne(File::class, 'id_news', 'id');
    }

    public function uploader()
    {
        return $this->hasOne(User::class, 'id', 'upload_by');
    }
}

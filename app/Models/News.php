<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Cviebrock\EloquentSluggable\Sluggable;
use Mews\Purifier\Casts\CleanHtmlOutput;
use Illuminate\Support\Str;

class News extends Model implements Viewable
{
    use HasFactory, SoftDeletes, InteractsWithViews, Sluggable;
    protected $guarded = [];

    protected $casts = [
        // 'bio'            => CleanHtml::class, // cleans both when getting and setting the value
        // 'description'    => CleanHtmlInput::class, // cleans when setting the value
        'description'        => CleanHtmlOutput::class, // cleans when getting the value
    ];

    public function getDescriptionAttribute($value)
    {
        if (Str::contains($value, 'https://bappeda.wonosobokab.go.id/storage/')) {
            $newValue = str_replace('https://bappeda.wonosobokab.go.id/storage/', 'https://bappeda.wonosobokab.go.id/show-picture?path=', $value);
            return $newValue;
        }
        return $value;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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

    public function kategorinya()
    {
        return $this->hasOne(ComCodes::class, 'code_cd', 'kategori');
    }
}

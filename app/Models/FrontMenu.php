<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class FrontMenu extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getContentAttribute($value)
    {
        if (Str::startsWith($value, 'src="https://website.wonosobokab.go.id/storage/')) {
            $newValue = str_replace('src="https://website.wonosobokab.go.id/storage/', 'src="https://docs.google.com/viewer?url="' . url('show-picture?path='), $value);
        } else {
            $newValue = str_replace('src="', 'src="https://docs.google.com/viewer?url=', $value);
        }

        $iframeEmbed = str_replace('<embed', '<iframe ', $newValue);
        $iframeEmbed = str_replace('></embed>', 'style="width:100%; height:800px;" frameborder="0"></iframe>', $iframeEmbed);

        return $iframeEmbed;
    }

    public function menu_induk()
    {
        return $this->belongsTo(FrontMenu::class, 'menu_parent');
    }

    public function anaknya()
    {
        return $this->hasMany(FrontMenu::class, 'menu_parent');
    }
}

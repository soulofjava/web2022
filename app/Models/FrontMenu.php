<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FrontMenu extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getContentAttribute($value)
    {
        // Ganti URL 'src' menggunakan regular expression
        $newValue = str_replace('src="https://website.wonosobokab.go.id/storage/', 'src="' . url('show-picture?path='), $value);
        return $newValue;
    }

    public function menu_induk()
    {
        return $this->belongsTo(FrontMenu::class, 'menu_parent');
    }
}

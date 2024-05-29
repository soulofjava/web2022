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
        //ubah juga ketika ada href="/storage/photos/
        $newValue = str_replace('src="/storage/photos/', 'src="' . url('show-picture?path=photos/'), $value);
        $newValue = str_replace('href="/storage/files/', 'href="' . url('show-picture?path=files/'), $newValue);
        return $newValue;
    }

    public function menu_induk()
    {
        return $this->belongsTo(FrontMenu::class, 'menu_parent');
    }
}

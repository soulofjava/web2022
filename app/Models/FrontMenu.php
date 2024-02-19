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
        // if (Str::contains('src="/storage/', $value)) {
        // Ganti URL 'src' menggunakan regular expression
        $newValue = str_replace('src="/storage/', 'src="' . url('show-picture?path='), $value);
        return $newValue;
        // }
        // return $value;
    }
}

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
        $substring = url('/') . '/storage/';

        if (Str::contains($value, $substring)) {
            $newValue = str_replace(url('/') . '/storage/', url('show-picture?path='), $value);
            return $newValue;
        }
        
        if (Str::contains($value, '/storage/')) {
            $newValue = str_replace('/storage/', url('show-picture?path='), $value);
            return $newValue;
        }

        return $value;
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

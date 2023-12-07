<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FrontMenu extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function menu_induk()
    {
        return $this->belongsTo(FrontMenu::class, 'menu_parent');
    }
}

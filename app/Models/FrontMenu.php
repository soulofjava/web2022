<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontMenu extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function submenu()
    {
        return $this->hasMany(FrontMenu::class, 'menu_parent', 'id');
    }
}

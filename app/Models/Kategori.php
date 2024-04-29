<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function groupe()
    {
        return $this->hasOne(ComCodes::class, 'code_cd', 'group');
    }
}

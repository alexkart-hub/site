<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'description',
        'level',
        'margin_left',
        'margin_right',
        'parent_id',
    ];

}

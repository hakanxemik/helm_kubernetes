<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor',
        'title',
        'text',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}

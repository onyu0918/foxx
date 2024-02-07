<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fox extends Model
{
    protected $table = 'foxx';
    use HasFactory;

    protected $fillable = [
        'content',
        'like',
    ];
}

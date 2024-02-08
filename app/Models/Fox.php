<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fox extends Model
{
    protected $table = 'foxx';
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ] ;

    protected $fillable = [
        'content',
        'like',
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}

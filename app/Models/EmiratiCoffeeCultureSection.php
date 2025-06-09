<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmiratiCoffeeCultureSection extends Model
{
    protected $fillable = ['title', 'description', 'videos', 'resources'];

    protected $casts = [
        'videos' => 'array',
        'resources' => 'array',
    ];
}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = ['title', 'description', 'cta_button', 'media'];

    protected $casts = [
        'cta_button' => 'array',
    ];
}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeroSection extends Model
{
    use HasTranslations;

    protected $fillable = ['title', 'description', 'cta_button', 'media'];

    protected $casts = [
        'cta_button' => 'array',
    ];

    public $translatable = ['title', 'description']; // Translatable fields
}

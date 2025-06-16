<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class EmiratiCoffeeCultureSection extends Model
{
    use HasTranslations;

    protected $fillable = ['title', 'description', 'videos', 'resources'];

    protected $casts = [
        'videos' => 'array',
        'resources' => 'array',
    ];

    public $translatable = ['title', 'description']; // Translatable fields
}

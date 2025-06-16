<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MemorySection extends Model
{
    use HasTranslations;

    protected $fillable = ['title', 'description', 'images', 'subtitle'];

    protected $casts = [
        'images' => 'array',
    ];

    public $translatable = ['title', 'description', 'subtitle']; // Translatable fields
}

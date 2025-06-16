<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductSection extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'products',
        'readmore_title',
        'readmore_link',
        'specific_program'
    ];

    protected $casts = [
        'products' => 'array',
        'specific' => 'boolean' // Fixed typo: 'specific' instead of 'specific_program'
    ];

    public $translatable = ['title', 'description', 'readmore_title']; // Translatable fields
}

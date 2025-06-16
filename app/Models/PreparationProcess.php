<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PreparationProcess extends Model
{
    use HasTranslations;

    protected $fillable = ['title', 'description', 'steps'];

    protected $casts = [
        'steps' => 'array',
    ];

    public $translatable = ['title', 'description']; // Translatable fields
}

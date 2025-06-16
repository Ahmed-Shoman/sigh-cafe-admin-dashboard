<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StoryArticleSection extends Model
{
    use HasTranslations;

    protected $fillable = ['title', 'description', 'subtitle', 'items'];

    protected $casts = [
        'items' => 'array',
    ];

    public $translatable = ['title', 'description', 'subtitle'];
}

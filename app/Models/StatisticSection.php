<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StatisticSection extends Model
{
    use HasTranslations;

    protected $fillable = ['title', 'description', 'stats'];

    protected $casts = [
        'stats' => 'array',
    ];

    public $translatable = ['title', 'description']; // Translatable fields
}

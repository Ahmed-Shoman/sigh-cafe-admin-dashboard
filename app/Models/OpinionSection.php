<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OpinionSection extends Model
{
    use HasTranslations;

    protected $fillable = ['title', 'description', 'opinions'];

    protected $casts = [
        'opinions' => 'array',
    ];

    public $translatable = ['title', 'description']; 
}

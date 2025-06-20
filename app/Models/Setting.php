<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['logo', 'links'];

    protected $casts = [
        'links' => 'array',
    ];

    public $translatable = []; 
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryArticleSection extends Model
{
    protected $fillable = ['title', 'description', 'subtitle', 'items'];

    protected $casts = [
        'items' => 'array',
    ];
}

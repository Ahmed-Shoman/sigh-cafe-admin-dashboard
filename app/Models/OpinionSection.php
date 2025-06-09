<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpinionSection extends Model
{
    protected $fillable = ['title', 'description', 'opinions'];

    protected $casts = [
        'opinions' => 'array',
    ];
}

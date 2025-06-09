<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemorySection extends Model
{
    protected $fillable = ['title', 'description', 'images', 'subtitle'];

    protected $casts = [
        'images' => 'array',
    ];
}

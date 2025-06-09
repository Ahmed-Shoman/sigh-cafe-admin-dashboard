<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
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
        'specific'=>'boolean'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Casts\Unsigned;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = 
    [
        'title',
        'stock',
        'origin',
    ];

    protected $rules =
    [
        'title' => 'string',
        'stock' => 'int',
        'origin' => 'string',
    ];

    protected $casts =
    [
        'stock' => Unsigned::class,
    ];
}

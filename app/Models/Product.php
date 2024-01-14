<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = true;

    protected $table = 'products';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'id',
        'title',
        'price',
        'description',
        'category',
        'image',
        'rate',
        'count',
    ];
}

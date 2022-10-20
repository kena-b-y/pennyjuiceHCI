<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'unit_price',
        'available_quantity',
        'added_by',
        'is_deleted',
    ];
}

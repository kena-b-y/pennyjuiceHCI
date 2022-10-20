<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable = [
        'role_name', 'updated_at', 'created_at', 'is_deleted'
    ];
}

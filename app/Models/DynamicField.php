<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicField extends Model
{
    protected $fillable = [
        'name', 'type', 'length', 'not_null', 'unsigned', 'auto_increment', 'index', 'default'
    ];
}

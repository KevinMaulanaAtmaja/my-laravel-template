<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'number',
        'checkbox',
        'radio',
        'select',
        'date',
        'range',
        'file',
        'color',
        'hidden',
    ];
}

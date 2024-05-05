<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalCrud extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_input',
        'number_input',
        'file_input',
        'dropdown_input',
        'date_input',
        'color_input',
        'radio_input',
        'hidden_input',
    ];
}

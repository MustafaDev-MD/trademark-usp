<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $casts = ['trademark_types' => 'array'];

    protected $fillable = [
        'first_name', 'last_name', 'trademark_types', 'trademark_name', 'trademark_slogan', 'logo_path', 'selected_plan',
        'name',
        'email',
        'phone',
        'message',
    ];
}

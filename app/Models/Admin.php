<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $guard = 'writer';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
}

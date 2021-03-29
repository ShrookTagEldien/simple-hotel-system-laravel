<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;
    protected $table='receptionists';
    protected $fillable = [
        'username',
        'email',
        'password',
        'NationalID',
        'avatar',
    
    ]; 
}

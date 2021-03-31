<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_number',
        'capacity',
        'status',
        'price',
    ];

    public function getData()
    {
        return static::where('status','available')->orderBy('created_at','desc')->get();
    }
}

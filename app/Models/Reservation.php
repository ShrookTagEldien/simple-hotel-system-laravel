<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_num',
        'accompany_number',
        'paid_price',
        'room_id',
        'user_id'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function user(){
        
        return $this->belongsTo(User::class);
    }
}

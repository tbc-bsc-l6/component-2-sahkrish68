<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
        
    ];

    /**
     * Define the relationship with the Room model.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
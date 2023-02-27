<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationBook extends Model
{
    use HasFactory;

    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'id', 'reservation_id');
    }

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
}

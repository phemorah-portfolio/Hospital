<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory;
    use Notifiable;

    public function doctor(){
        return $this->belongsTo(related: Doctor::class);
    }

    public function user() {
        return $this->belongsTo(Relate: User::class);
    }
}

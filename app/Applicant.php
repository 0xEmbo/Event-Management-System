<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use Notifiable;

    public function event() {
        return $this->belongsTo(Event::class);
    }
    public function room() {
        return $this->belongsTo(Room::class);
    }
}

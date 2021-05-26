<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function events() {
        return $this->hasMany(Event::class);
    }
    public function applicants() {
        return $this->hasMany(Applicant::class);
    }
}

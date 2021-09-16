<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function users() {
        return $this-> belongsTo(User::class);
    }

    public function patients() {
        return $this-> belongsTo(Patient::class);
    }
}

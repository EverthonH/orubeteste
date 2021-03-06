<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'room',
        'complaint',
        'procedure',
        'hour',
        'user_id',
        'doctor_id',
        'patient_id',
    ];

    public function user() {
        return $this-> belongsTo(User::class);
    }

    public function patient() {
        return $this-> belongsTo(Patient::class);
    }
    public function doctor() {
        return $this-> belongsTo(Doctor::class);
    }
}

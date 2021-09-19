<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cpf',
        'name',
        'birth',
        'sex',
        'height',
        'health_insurance',
        'weight',
        'blood_type',
        'cell_phone',
        'comment',
    ];
    
    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'cpf',
        'crm',
        'birth',
        'cell_phone',
    ];

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}

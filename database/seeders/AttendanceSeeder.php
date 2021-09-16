<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use \App\Models\User;
use \App\Models\Doctor;
use \App\Models\Patient;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 0; $x < 3; $x++){
            for($y = 1; $y <= 3; $y++) {
                 Attendance::factory(1)->create([
                      'user_id' => User::find($x + 1),
                      'doctor_id' => Doctor::find($x + 1),
                      'patient_id' => Patient::find($y + ($x * 3)),
                 ]);
            }
       }
    }
}

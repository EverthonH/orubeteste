<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function show()
    {
        $doctors_list = Doctor::all();
        return view('dashboard', ['doctors_list' => $doctors_list]);
    }

}

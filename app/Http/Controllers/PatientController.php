<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function show()
    {
        $patients_list = Patient::all();
        return view('dashboard', ['patients_list' => $patients_list]);
    }
}

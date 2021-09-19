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
    public function create()
    {
        return view('dashboard', ['create_patient' => true]);
    }
    public function store(request $request){

        $request->validate([
            
            'cpf' => ['required','string', 'min:11', 'max:14','unique:patients'],
            'name' => ['required', 'string', 'max:255'],
            'birth' => ['required'],
            'sex' => ['required'],
            'height' => ['required'],
            'health_insurance' => ['required'],
            'weight' => ['required'],
            'blood_type' => ['required','min:2', 'max:3'],
            'cell_phone' => ['required', 'min:11','max:18'],
            'comment' => ['max:1024'],
        ]);
        
        Patient::create([
            'cpf'=> $request->cpf,
            'name'=> $request->name,
            'birth'=> $request->birth,
            'sex'=> $request->sex,
            'height'=> $request->height,
            'health_insurance'=> $request->health_insurance,
            'weight'=> $request->weight,
            'blood_type'=> $request->blood_type,
            'cell_phone'=> $request->cell_phone,
            'comment'=> $request->comment,
        ]);

        return redirect('dashboard');
    }

    public function destroy(Patient $patient) {

        $patient->delete();
        return redirect('/list/patients');
    }

    public function update(Request $request, Patient $patient) {

        $patient->update([
            'name'=> $request->name,
            'birth'=> $request->birth,
            'sex'=> $request->sex,
            'height'=> $request->height,
            'health_insurance'=> $request->health_insurance,
            'weight'=> $request->weight,
            'blood_type'=> $request->blood_type,
            'cell_phone'=> $request->cell_phone,
            'comment'=> $request->comment,
        ]);

        return redirect('/list/patients');

    }
}

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
    public function create()
    {
        return view('dashboard', ['create_doctor' => true]);
    }
    public function store(Request $request)
    {
        $request->validate([
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
            'cpf' => ['required', 'string', 'min:11', 'max:14', 'unique:doctors'],
            'crm' => ['required','max:14','unique:doctors'],
            'cell_phone' => ['required', 'min:11','max:18'],
        ]);
        Doctor::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'cpf'=> $request->cpf,
            'crm'=> $request->crm,
            'birth'=> $request->birth,
            'cell_phone'=> $request->cell_phone,
        ]);

        return redirect('dashboard');
    }

}

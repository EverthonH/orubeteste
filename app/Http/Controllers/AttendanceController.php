<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{
    public function create()
    {
        return view('dashboard', ['create_attendance' => true]);
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            
            'room' => ['required', 'integer'],
            'complaint' => ['required', 'string'],
            'procedure' => ['required', 'string'],
            'doctor_cpf' => ['required'],
            'patient_cpf' => ['required'],
        ]);
            
        $doctor_selected = explode(' / ', $request->doctor_cpf);
        $cpf_doctor = $doctor_selected[1];
        $patient_selected = explode(' / ', $request->patient_cpf);
        $cpf_patient = $patient_selected[1];
        
        $doctor = DB::table('doctors')->where('cpf', $cpf_doctor)->get();
        $patient = DB::table('patients')->where('cpf', $cpf_patient)->get();
        
        Attendance::create([
            'room' => $request->room,
            'complaint' => $request->complaint,
            'procedure' => $request->procedure,
            'hour' => $request->date . ' ' . $request->hour,
            'user_id' => Auth::user()->id,
            'doctor_id' => $doctor[0]->id,
            'patient_id' => $patient[0]->id,
        ]);
        return redirect('dashboard');
    }
}

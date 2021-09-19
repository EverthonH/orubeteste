@props(['type'])

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

@if($type == 'doctor')
    <form method="POST" action="{{ route('store_doctor') }}">
@elseif($type == 'patient')
    <form method="POST" action="{{ route('store_patient') }}">
@else
    <form method="POST" action="{{ route('store_attendance') }}">
@endif
        @csrf
        {{-- input doctors --}}
        @if($type == 'doctor')
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Ex: Everthon Henrique da Paz Barbosa" :value="old('name')" required />
            </div>
            <!-- Birth -->
            <div class="mt-4">
                <x-label for="birth" :value="__('Nascimento')" />
                <x-input id="birth" class="block mt-1 w-full" type="date" name="birth" :value="old('birth')" required  />
            </div>
            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Ex: ehpb@email.com" :value="old('email')" required />
            </div>
            <!-- CPF -->
            <div class="mt-4">
                <x-label for="cpf" :value="__('CPF')" />
                <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" placeholder="Ex: 123.456.789-10" :value="old('cpf')" required />
            </div>
            <!-- CRM -->
            <div class="mt-4">
                <x-label for="crm" :value="__('CRM')" />
                <x-input id="crm" class="block mt-1 w-full" type="text" name="crm" placeholder="Ex: 9999999999/PE" :value="old('crm')" required  />
            </div>
            <!-- Cell phone -->
            <div class="mt-4">
                <x-label for="cell_phone" :value="__('Número de celular')" />
                <x-input id="cell_phone" class="block mt-1 w-full" type="text" name="cell_phone" placeholder="Ex: (81) 91234-1234" :value="old('cell_phone')" required  />
            </div>

        {{-- input patients --}}
        @elseif($type == 'patient')
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Ex: Everthon Henrique da Paz Barbosa" :value="old('name')" required  />
            </div>
            <!-- Birth -->
            <div class="mt-4">
                <x-label for="birth" :value="__('Nascimento')" />
                <x-input id="birth" class="block mt-1 w-full" type="date" name="birth" :value="old('birth')" required />
            </div>
            <!-- Sex -->
            <div class="mt-4">
                <x-label for="sex" :value="__('Sexo')" />
                <select id="sex" class="block mt-1 w-full" type="text" name="sex" :value="old('sex')" required>
                    <option>-----</option>
                    <option>Masculino</option>
                    <option>Feminino</option>
                    <option>Prefiro não informar</option>
                </select>
            </div>
            <!-- CPF -->
            <div class="mt-4">
                <x-label for="cpf" :value="__('CPF')" />
                <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" placeholder="Ex: 123.456.789-10" :value="old('cpf')" required  />
            </div>
            <!-- Cell phone -->
            <div class="mt-4">
                <x-label for="cell_phone" :value="__('Número de celular')" />
                <x-input id="cell_phone" class="block mt-1 w-full" type="text" name="cell_phone" placeholder="Ex: (81) 91234-1234" :value="old('cell_phone')" required  />
            </div>
            <!-- Height -->
            <div class="mt-4">
                <x-label for="height" :value="__('Altura(cm)')" />
                <x-input id="height" class="block mt-1 w-full" type="number" name="height" placeholder="Ex: 175" :value="old('height')" required  />
            </div>
            <!-- Weight -->
            <div class="mt-4">
                <x-label for="weight" :value="__('Peso(g)')" />
                <x-input id="weight" class="block mt-1 w-full" type="number" name="weight" placeholder="Ex: 51" :value="old('weight')" required  />
            </div>
            <!-- Blood type -->
            <div class="mt-4">
                <x-label for="blood_type" :value="__('Tipo sanguíneo')" />
                <select id="blood_type" class="block mt-1 w-full" type="text" name="blood_type" :value="old('blood_type')" required >
                    <option>-----</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>O+</option>
                    <option>O-</option>
                </select>
            </div>
            <!-- Health insurance -->
            <div class="mt-4">
                <x-label for="health_insurance" :value="__('Plano de saúde')" />
                <x-input id="health_insurance" class="block mt-1 w-full" type="text" name="health_insurance" placeholder="Ex: Unimed" :value="old('health_insurance')" required  />
            </div>
            <!-- Comment -->
            <div class="mt-4">
                <x-label for="comment" :value="__('Observações')" />
                <x-input id="comment" class="block mt-1 w-full" type="text" name="comment" placeholder="Alergia à dipirona" :value="old('comment')" required  />
            </div>

        {{-- input attendances --}}
        @else
            <!-- Room -->
            <div>
                <x-label for="room" :value="__('Sala')" />
                <x-input id="room" class="block mt-1 w-full" type="number" name="room" placeholder="Ex: C7" :value="old('room')" required autofocus />
            </div>
            <!-- Complaint -->
            <div class="mt-4">
                <x-label for="complaint" :value="__('Doença ou queixas ')" />
                <x-input id="complaint" class="block mt-1 w-full" type="text" name="complaint" placeholder="Ex: Dor no peito" :value="old('complaint')" required />
            </div>
            <!-- Procedure -->
            <div class="mt-4">
                <x-label for="procedure" :value="__('Procedimentos realizado')" />
                <x-input id="procedure" class="block mt-1 w-full" type="text" name="procedure" placeholder="Ex: Cirurgia, entre outros" :value="old('procedure')" required autofocus />
            </div>
            <!-- Date -->
            <div class="mt-4">
                <x-label for="date" :value="__('Data')" />
                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus />
            </div>
            <!-- Hour -->
            <div class="mt-4">
                <x-label for="hour" :value="__('Horário')" />
                <x-input id="hour" class="block mt-1 w-full" type="time" name="hour" :value="old('hour')" required autofocus />
            </div>
            <!-- Doctor_CPF -->
            <div class="mt-4">
                <x-label for="doctor_cpf" :value="__('Médico')" />
                <select id="doctor_cpf" class="block mt-1 w-full text-black" type="text" name="doctor_cpf" required>
                    <option>-----</option>
                    @foreach (App\Models\Doctor::all() as $doctor)
                        @if($doctor->delete == false)
                            <option>{{ $doctor->name . " / " . $doctor->cpf }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <!-- Patient_CPF -->
            <div class="mt-4">
                <x-label for="patient_cpf" :value="__('Paciente')" />
                <select id="patient_cpf" class="block mt-1 w-full mb-3" type="text" name="patient_cpf" required >
                    <option>-----</option>
                    @foreach (App\Models\Patient::all() as $patient)
                        @if($patient->delete == false)
                            <option>{{ $patient->name . " / " . $patient->cpf }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        @endif
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
    </form>
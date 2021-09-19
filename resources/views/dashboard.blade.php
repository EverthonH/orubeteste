@php
if(isset($doctors_list)) {
    $prop_table = 'doctors';
} elseif(isset($patients_list)) {
    $prop_table = 'patients';
} elseif(!isset($doctors_list) && !isset($patients_list)) {
    $prop_table = 'attendances';
}
@endphp

@php
if(isset($create_doctor)) {
    $prop_register = 'doctor';
} elseif(isset($create_patient)) {
    $prop_register = 'patient';
} else {
    $prop_register = 'attedance';
}
@endphp

<x-app-layout>
    <x-slot name="header"> 
        <div x-data="{doctors: false, patients: false, attendances: false}">
            <div class="text-blue-700">   
                <span x-on:click="patients = false; attendances = false; doctors = ! doctors" x-bind:class="{'bg-blue-500  text-white': doctors}" class="cursor-pointer bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ">
                    Médicos
                </span>
                <span x-on:click="doctors = false; attendances = false; patients = ! patients" x-bind:class="{'bg-blue-500 text-white': patients}" class="cursor-pointer bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-3">
                    Pacientes
                </span>
                <span x-on:click="doctors = false; patients = false; attendances = ! attendances" x-bind:class="{'bg-blue-500 text-white': attendances}" class="cursor-pointer bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-3">
                    Atendimentos
                </span>
            </div>
            <div x-show="doctors" class="mt-8 h-full">
                <a href="{{route('create_doctor')}}" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Registrar médico</a>
                <a href="{{route('list_doctors')}}" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-3"> Lista de médicos</a>
            </div>
            <div x-show="patients" class="mt-8 h-full">
                <a href="{{route('create_patient')}}" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Registrar paciente</a>
                <a href="{{route('list_patients')}}" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-3"> Lista de pacientes</a>
            </div>
            <div x-show="attendances" class="mt-8 h-full">
                <a href="{{route('create_attendance')}}" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Registrar atendimento</a>
                <a href="{{route('dashboard')}}" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-3">Lista de atendimentos</a>
            </div>
        </div>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if(isset($create_attendance) || isset($create_doctor) || isset($create_patient))
                            <x-register-form :type="$prop_register"/>
                        @else
                            <x-list-table :entity="$prop_table"/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

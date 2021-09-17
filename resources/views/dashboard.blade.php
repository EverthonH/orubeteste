@php
if(isset($doctors_list)) {
    $prop_table = 'doctors';
} elseif(isset($patients_list)) {
    $prop_table = 'patients';
} else {
    $prop_table = 'attendances';
}
@endphp

<x-app-layout>
    <x-slot name="header"> 
        <div x-data="{doctors: false, patients: false}">
            <div class="text-blue-700">   
                <span x-on:click="patients = false; doctors = ! doctors" x-bind:class="{'bg-blue-500  text-white': doctors}" class="cursor-pointer bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ">
                    Médicos
                </span>
                <span x-on:click="doctors = false; patients = ! patients" x-bind:class="{'bg-blue-500 text-white': patients}" class="cursor-pointer bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-3">
                    Pacientes
                </span>
            </div>
            <div x-show="doctors" class="mt-8 h-full">
                <a href="" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Registrar médico</a>
                <a href="{{route('list_doctors')}}" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-3"> Lista de médicos</a>
            </div>
            <div x-show="patients" class="mt-8 h-full">
                <a href="" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Registrar paciente</a>
                <a href="{{route('list_patients')}}" class="cursor-pointer bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-3"> Lista de pacientes</a>
            </div>
        </div>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-list-table :entity="$prop_table"/>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

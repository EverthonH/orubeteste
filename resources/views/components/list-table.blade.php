@props(['entity'])

@php
if($entity == 'attendances'){
    $list = \App\Models\Attendance::all();
}elseif($entity == 'doctors'){
    $list = \App\Models\Doctor::all();
}else{
    $list = \App\Models\Patient::all();
}
@endphp

{{-- Atendimento --}}
<div>
    <div class="grid grid-cols-4 gap-1 border-2 border-gray-900 py-2 pl-2">
        @if($entity == 'attendances')
            <div>Médico</div>
            <div>Paciente</div>
            <div>Horário</div>
        @elseif($entity == 'doctors')
            <div>Médico</div>
            <div>CPF</div>
            <div>CRM</div>
        @else
            <div>Paciente</div>
            <div>CPF</div>
            <div>Idade</div>
        @endif
            <div class="text-center">Ações</div>
    </div>
    @foreach($list as $element)
    <div class="grid grid-cols-4 gap-1 border-b border-gray-900 py-2 pl-2">
        @if($entity == 'attendances')
            <div>{{$element->doctor->name}}</div>
            <div>{{$element->patient->name}}</div>
            <div>{{$element->hour}}</div>
        @elseif($entity == 'doctors')
            <div>{{$element->name}}</div>
            <div>{{$element->cpf}}</div>
            <div>{{$element->crm}}</div>
        @else
            <div>{{$element->name}}</div>
            <div>{{$element->cpf}}</div>
            <div>{{$element->age}} anos</div>
        @endif
        {{-- Ações --}}
        <div class="grid grid-cols-3 m-auto gap-3 ">
            {{-- Visualizar --}}
            <a href="">
                <div> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                    </svg>
                </div> 
            </a>
            {{-- Editar --}}
            <a href="">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                </svg>
            </div>
        </a>
            {{-- Apagar --}}
            <a href="">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>


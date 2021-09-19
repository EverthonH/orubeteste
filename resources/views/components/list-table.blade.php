@props(['entity'])

@php
if($entity == 'attendances'){
    $list = \App\Models\Attendance::all();
    $delete = 'delete_attendance';
}elseif($entity == 'doctors'){
    $list = \App\Models\Doctor::all();
    $delete = 'delete_doctor';
}elseif($entity == 'patients'){
    $list = \App\Models\Patient::all();
    $delete = 'delete_patient';
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
            <div>Nascimento</div>
        @endif
            <div class="text-center">Ações</div>
    </div>
    @foreach($list as $element)
        @if($element->delete == false || !isset($element->delete))
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
                    <div>{{$element->birth}}</div>
                @endif
                {{-- Ações --}}
                <div class="grid grid-cols-3 m-auto gap-3" x-date="{click: false}">
                    {{-- Visualizar --}}
                        <div>
                            <div x-data="{ add_modal: false }">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="">
                                        <div class="">
                                            <div @click="add_modal = true">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fixed z-10 inset-0 overflow-y-auto" style="display: none;" x-show="add_modal">
                                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="add_modal = false">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            <div class="p-3">
                                                @if($entity == 'attendances')
                                                    <h1>Detalhes do atendimento</h1>
                                                    <div>
                                                        Nome do médico: {{$element->doctor->name}}
                                                    </div>
                                                    <div>
                                                        CPF do médico: {{$element->doctor->cpf}}
                                                    </div>
                                                    <div>
                                                        Nome do paciente: {{$element->patient->name}}
                                                    </div>
                                                    <div>
                                                        CPF do paciente: {{$element->patient->cpf}}
                                                    </div>
                                                    <div>
                                                        @php
                                                        $element_hour = $element->hour;
                                                        $date_hour = explode(' ', $element_hour);
                                                        $date = $date_hour[0];
                                                        $hour = $date_hour[1];
                                                        @endphp
                                                         Data: {{$date}}
                                                    </div>
                                                    <div>
                                                        Horário: {{$hour}}
                                                    </div>
                                                    <div>
                                                        Sala: {{$element->romm}}
                                                    </div>
                                                    <div>
                                                        Observações: {{$element->complaint}}
                                                    </div>
                                                    <div>
                                                        Procedimentos: {{$element->procedure}}
                                                    </div>
                                                @elseif($entity == 'doctors')
                                                    <h1>Detalhes do atendimento</h1>
                                                    <div>
                                                        Nome: {{$element->name}}
                                                    </div>
                                                    <div>
                                                        CPF{{$element->cpf}}
                                                    </div>
                                                    <div>
                                                        CRM: {{$element->crm}}
                                                    </div>
                                                    <div>
                                                        E-mail: {{$element->email}}
                                                    </div>
                                                     <div>
                                                        Número do celular: {{$element->cell_phone}}
                                                    </div>
                                                    <div>
                                                        Nascimento: {{$element->birth}}
                                                    </div>

                                                @else
                                                    <h1>Detalhes do paciente</h1>
                                                    <div>
                                                        Nome: {{$element->name}}
                                                    </div>
                                                    <div>
                                                        CPF: {{$element->cpf}}
                                                    </div>
                                                    <div>
                                                        Sexo: {{$element->sex}}
                                                    </div>
                                                    <div>
                                                        Altura: {{$element->height}}
                                                    </div>
                                                    <div>
                                                        Peso: {{$element->weight}}
                                                    </div>
                                                    <div>
                                                        Tipo sanguíneio: {{$element->blood_type}}
                                                    </div>
                                                    <div>
                                                        Plano de saúde: {{$element->health_insurance}}
                                                    </div>
                                                    <div>
                                                        {{$element->comment}}
                                                    </div>

                                                @endif

                                                <a class="underline text-sm text-red-600 hover:text-red-900" href="#"@click="add_modal=false">
                                                    {{ __('Fechar') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <a href="{{route($delete, $element->id )}}">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
         @endif
    @endforeach
</div>
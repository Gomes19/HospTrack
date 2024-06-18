@extends('layouts.admin.index')
@section('conteudo')
    <div class="content-inner container-fluid pb-0" id="page_layout">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Livro de Pontos</h4>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target=".bd-example-modal-xl">Marcar Presença

                                <svg class="size-28 hvr-icon" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                                        fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="input-datatable" class="table" data-toggle="data-table-column-filter">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Médico</th>
                                        <th>Entrada</th>
                                        <th>Saida</th>
                                        <th>Data</th>
                                        <th>Acções</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($livropontos as $livroponto)
                                        <tr>
                                            <td>{{ $livroponto->medicos()->first()->id }}</td>
                                            <td>
                                                {{ $livroponto->medicos()->first()->first_name }}  {{ $livroponto->medicos()->first()->last_name }}
                                            </td>
                                            <td>
                                            {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $livroponto->entrada)->format('H:i') }}
                                            </td>
                                            <td>
                                            @if($livroponto->saida)
                                            {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $livroponto->saida)->format('H:i')  }}
                                            @else
                                            N/A
                                            @endif
                                            </td>
                                         
                                            <td>
                                            {{ $livroponto->created_at->format('Y/m/d') }}  
                                            </td>

                                            <td>
                                                @if(!$livroponto->saida)
                                                    <a  title ="Marcar Saída" class="btn btn-sm btn-icon btn-success rounded" data-bs-toggle="modal"data-bs-target=".bd-example-modal-xl{{ $livroponto->id }}">
                                                        <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.5469 5.04688L9.54688 15.0469L4.45312 9.95312" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        </span>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- MODAL CADASTRAR USUARIO --}}
                                        <div class="modal fade bd-example-modal-xl{{ $livroponto->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ $livroponto->medicos()->first()->first_name  . " ". $livroponto->medicos()->first()->last_name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if(Auth::user()->it_tipo_utilizador == 1)
                                                        <form
                                                            action="{{ route('admin.livroponto.update', $livroponto->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                        @else
                                                        <form
                                                            action="{{ route('gestao.livroponto.update', $livroponto->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                        @endif    
                                                            @include('forms.livroponto.edit')
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn  btn-secondary"
                                                                    data-dismiss="modal">Fechar</button>
                                                                <button class="btn  btn-primary"
                                                                    id="ajaxSubmit">Marcar Saída</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                     
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th title="ID">ID</th>
                                        <th title="MEDICO">MEDICO</th>
                                        <th title="ENTRADA">ENTRADA</th>
                                        <th title="DATA">DATA</th>
                                        <th title="SAIDA">SAIDA</th>
                                      

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL CADASTRAR USUARIO --}}
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Marcar Presença</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                        @if(Auth::user()->it_tipo_utilizador == 1)
                        <form action="{{ route('admin.livroponto.store') }}" method="post"
                                enctype="multipart/form-data"> 
                        @else
                        <form action="{{ route('gestao.livroponto.store') }}" method="post"
                                enctype="multipart/form-data">
                        @endif
               
                        @csrf

                        @include('forms.livroponto.index')

                        <div class="modal-footer">
                            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                            <button class="btn  btn-primary" id="ajaxSubmit">Marcar Presença</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                             <button type="button" class="btn btn-primary">Save changes</button>
                          </div> --}}
            </div>
        </div>
    </div>
@if (session('success'))
    <script>
        var successMessage = "{{ session('success') }}";
        Swal.fire({
            title: "Sucesso!",
            text: successMessage,
            icon: "success"
        });
    </script>
@endif

@if (session('error'))
    <script>
        var errorMessage = "{{ session('error') }}";
        Swal.fire({
            title: "Erro!",
            text: errorMessage,
            icon: "error"
        })
    </script>
@endif 

@endsection

@extends('layouts.admin.index')
@section('title', 'Hospital')
@section('conteudo')
@if(Auth::user()->it_tipo_utilizador == 1)
<div class="content-inner container-fluid pb-0" id="page_layout">
    
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Hospitais</h4>
                </div>
                <div>
                    <a  class="btn btn-primary mt-2" href="{{ route('admin.hospital.create') }}">Cadastrar Hospital

                        <svg class="size-28 hvr-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>                            
                        </svg>
                    </a>
                </div>
             </div>
             <div class="card-body">
            
                <div class="table-responsive">
                   <table id="input-datatable" class="table" data-toggle="data-table-column-filter">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Documento</th>
                            <th>Estado</th>
                            <th>Admin</th>
                            <th>Médicos</th>
                            <th>Funcionários</th>
                            {{-- <th>Pagamento</th> --}}
                            <th>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hospitais as $hospital)
                        <tr>
                            <td>{{$hospital->id}}</td>
                            <td>
                              <div>
                              <img src="{{asset($hospital->logotipo)}}" alt="hospital-logo"
                               
                               class="theme-color-grey-img img-fluid rounded-pill avatar-50" loading="lazy" >
                              </div>
                              </td>
                            <td>
                                {{$hospital->nome}}
                            </td>
                            <td>{{$hospital->tipo()->first()->vc_nome}}</td>
                           
                            <td>
                              @if($hospital->documentos()->first()->documento)
                              <a target= "_blank" href="{{$hospital->documentos()->first()->documento}}">Enviado</a>
                              @else
                              Não enviado
                              @endif
                            </td>
                           
                            <td>
                            
                            @if($hospital->estado == 0)

                           <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                           <span class="badge bg-warning">Em Análise</span>
                           </li>

                           @endif
                           @if($hospital->estado == 1)

                           <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                           <span class="badge bg-success">Aprovado</span>
                           </li>

                           @endif

                           @if($hospital->estado == 2)

                           <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                           <span class="badge bg-danger">Não Aprovada</span>
                           </li>

                           @endif                            
                           </td>
                           
                            <td>
                            {{$hospital->user()->where('cargo', 0)->first()->name}}
                            </td>
                            <td>
                            {{$hospital->medicos()->count()}}
                            </td>
                            <td>
                            {{$hospital->user()->where('cargo', '!=', 0)->count()}}
                            </td>
                            {{-- <td>
                                @if ($hospital->pagamento==0)
                                Pendente
                                @elseif ($hospital->pagamento==1)
                                    Realizado
                                @else
                                    Não Realizado
                                @endif
                            </td> --}}

                            <td>
                           
                                 @if($hospital->estado == 0)
                                 <a  title ="Aprovar" class="btn btn-sm btn-icon btn-success rounded" href ="{{ route('admin.hospital.aprovar', $hospital->id) }}">
                                    <span class="btn-inner">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M19.5469 5.04688L9.54688 15.0469L4.45312 9.95312" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </span>
                                 </a>

                                 <a title ="Reprovar" class="btn btn-sm btn-icon btn-danger rounded" href ="{{ route('admin.hospital.reprovar', $hospital->id) }}">
                                    <span class="btn-inner">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M6.34314 5.65686L17.6569 17.6569" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M17.6569 5.65686L6.34314 17.6569" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    </span>
                                 </a>

                                
                                 @endif
                                 @if($hospital->estado == 1)

                                 <a title ="Reprovar" class="btn btn-sm btn-icon btn-danger rounded" href ="{{ route('admin.hospital.reprovar', $hospital->id) }}">
                                    <span class="btn-inner">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M6.34314 5.65686L17.6569 17.6569" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M17.6569 5.65686L6.34314 17.6569" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    </span>
                                 </a>

                                 @endif

                                 @if($hospital->estado == 2)

                                 <a  title ="Aprovar" class="btn btn-sm btn-icon btn-success rounded" href ="{{ route('admin.hospital.aprovar', $hospital->id) }}">
                                    <span class="btn-inner">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M19.5469 5.04688L9.54688 15.0469L4.45312 9.95312" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </span>
                                 </a>

                                 @endif

                                <a class="btn btn-sm btn-icon btn-warning rounded" data-bs-toggle="modal"data-bs-target=".bd-example-modal-xl{{$hospital->id}}"  >
                                    <span class="btn-inner">
                                       <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                                 </a>
                                 <a class="btn btn-sm btn-icon btn-danger rounded" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Eliminar" href="{{route('admin.hospital.delete', $hospital->id)}}"">
                                    <span class="btn-inner">
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                          <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                                 </a>
                                </td>
                        </tr>
                       {{-- MODAL CADASTRAR USUARIO --}}
                <div class="modal fade bd-example-modal-xl{{$hospital->id}}" tabindex="-1" role="dialog"   aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-title">Editar hospital</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                             </button>
                          </div>
                          <div class="modal-body">
                          @if(Auth::user()->it_tipo_utilizador == 1)
                            <form action="{{route('admin.hospital.update',$hospital->id)}}" method="post" enctype="multipart/form-data"> 
                          @else
                          <form action="{{route('gestao.hospital.update',$hospital->id)}}" method="post" enctype="multipart/form-data"> 
                          @endif
                            @csrf
                                <div class = "row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                 <label for="nome">Nome</label>
                                    <input type="text" id="nome" class="form-control 
                                    @error('hospital_name')
                                    is-invalid 
                                    @enderror 
                                    " name="hospital_name"
                                       placeholder="Nome" value="{{ $hospital->nome }}">
                                    @error('hospital_name') 
                                    <p style = "color: red;" > {{ $message }}</p>
                                    @enderror  
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                              <label for="enderco">Endereço</label>
                                    <input type="text" id="address_input" class="form-control @error('endereco')
                                    is-invalid 
                                    @enderror
                                    " name="endereco"
                                       placeholder="Endereço" value = "{{ $hospital->endereco }}">
                                    <input type="hidden" id="lat" name="lat" value ="{{ $hospital->lat }}">
                                    <input type="hidden" id="long" name="long" value ="{{ $hospital->long }}">
                                    <p id = "errorText"></p>
                                    @error('endereco') 
                                    <p style = "color: red;" > {{ $message }}</p>
                                    @enderror
                              </div> 
                              </div>
                                         
                                @include('admin.hospital.edit')
                                
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button  class="btn  btn-primary" id="ajaxSubmit" >Cadastrar</button>
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
                     @endforeach
                    </tbody>
                      <tfoot>
                         <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Documento</th>
                            <th>Estado</th>
                            <th>Admin</th>
                            <th>Médicos</th>
                            <th>Funcionários</th>
                            {{-- <th>Pagamento</th> --}}
                            <th>Acções</th>
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
                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"   aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-title">Cadastrar hospital</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                             </button>
                          </div>
                          <div class="modal-body">
                           @if(Auth::user()->it_tipo_utilizador == 1)
                            <form action="{{route('admin.hospital.store')}}" method="post" enctype="multipart/form-data">
                            @else
                            <form action="{{route('gestao.hospital.store')}}" method="post" enctype="multipart/form-data">
                            @endif    
                            @csrf
                                <div class = "row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                 <label for="nome">Nome</label>
                                    <input type="text" id="nome" class="form-control 
                                    @error('hospital_name')
                                    is-invalid 
                                    @enderror 
                                    " name="hospital_name"
                                       placeholder="Nome" value="">
                                    @error('hospital_name') 
                                    <p style = "color: red;" > {{ $message }}</p>
                                    @enderror  
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                              <label for="enderco">Endereço</label>
                                    <input type="text" id="address_input" class="form-control @error('endereco')
                                    is-invalid 
                                    @enderror
                                    " name="endereco"
                                       placeholder="Endereço">
                                    <input type="hidden" id="lat" name="lat">
                                    <input type="hidden" id="long" name="long">
                                    <p id = "errorText"></p>
                                    @error('endereco') 
                                    <p style = "color: red;" > {{ $message }}</p>
                                    @enderror
                              </div> 
                              </div>
                                         
                                @include('admin.hospital.form')
                                
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button  class="btn  btn-primary" id="ajaxSubmit" >Cadastrar</button>
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
@else

<div class="content-inner container-fluid pb-0" id="page_layout">
<div class="row">
<div class="col-lg-12">
    <div class="card">
         <div class="card-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
               <div class="d-flex flex-wrap align-items-center">
                  <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                    @if(!$hospitais->logotipo)
                     <img src="{{asset('site_temp/images/logo-3.png')}}" alt="hospital-Profile" class="theme-color-gray-img img-fluid rounded-pill avatar-100" style ="backgroud-color:#fff"  loading="lazy">
                    @else
                     <img src="{{ asset($hospitais->logotipo) }}" alt="hospital-Profile" class="theme-color-gray-img img-fluid rounded-pill avatar-100" style ="backgroud-color:#fff" loading="lazy">
                    @endif
                  </div>
                  <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                     <h4 class="me-2 h4">{{ $hospitais->nome }}</h4>
                     <span>
                        {{ $hospitais->tipo()->first()->nome }}
                     </span>
                  </div>
               </div>
                   @if($hospitais->estado == 0)

                   <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                     <span class="badge bg-warning">Hospital em Análise</span>
                  </li>
                   
                  @endif
                  @if($hospitais->estado == 1)

                   <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                     <span class="badge bg-success">Hospital Aprovado</span>
                  </li>
                   
                  @endif

                  @if($hospitais->estado == 2)

                   <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                     <span class="badge bg-danger">Hospital Não Aprovada</span>
                  </li>

                  @endif
            </div>
         </div>
    </div>
 </div>
 <div class="col-sm-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
          <div class="header-title">
             <h4 class="card-title">Editar Hospital</h4>
          </div>
     
       </div>
       <div class="card-body">
         <form method="post" action="{{ route('gestao.hospital.update',$hospitais->id ) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class= "form-label" >Nome</label>
                           <input type="text" class= "form-control"  value = "{{ $hospitais->nome }}"  name="hospital_name" placeholder="Nome" required>
                        </div>
                        @error('hospital_name')
                           <span style ="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label class ="form-label" >Endereço</label>
                           <input type="text" class ="form-control"  value ="{{ $hospitais->endereco }}" name ="endereco" id ="address_input" class="form-control" required>
                           
                           <input type="hidden" value ="{{ $hospitais->lat }}" name ="lat" id ="lat">
                           <input type="hidden" value ="{{ $hospitais->long }}" name ="long" id= "long">
                        </div>
                        @error('endereco')
                           <span style ="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                           <label>Tipo de Hospital</label>
                           <select name ="hospital_type" class ="form-control">
                                    <option value="">--Selecione um tipo</option>
                                    @foreach($tipoHospitais as $tipo)
                                    <option value="{{ $tipo->id }}" {{ $tipo->id == $hospitais->tipo_hospitais_id ? 'selected' : '' }}>{{ $tipo->vc_nome }}</option>
                                    @endforeach
                           </select>
                        </div>
                        @error('hospital_type')
                           <span style ="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                  </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Areas Diponíveis</label>
                           <select name ="hospital_area[]" class ="form-control" id ="areas" multiple>
                                    @foreach($areaHospitais as $area)
                                       @foreach($hospitais->areas()->get() as $hospitalarea)
                                    <option value="{{ $area->id }}" {{ $area->id == $hospitalarea->id ? 'selected' : '' }}>{{ $area->vc_nome }}</option>
                                       @endforeach
                                    @endforeach
                           </select>
                        </div>
                        @error('hospital_area')
                           <span style ="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Serviços Diponíveis</label>
                                    <select name ="hospital_servico[]" class ="form-control" id ="servicos" multiple>
                                       @foreach($servioHospitais as $servico)
                                          @foreach($hospitais->servicos()->get() as $hospitalservico)
                                       <option value="{{ $servico->id }}" {{ $servico->id == $hospitalservico->id ? 'selected' : '' }}>{{ $servico->vc_nome }}</option>
                                          @endforeach
                                       @endforeach
                                    </select>
                                </div>
                                @error('hospital_servico')
                                    <span style ="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="descricao" id="" cols="15" rows="10" class ="form-control" >{{$hospitais->descricao}}</textarea>
                     </div>
                     @error('descricao')
                        <span style ="color: red" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                     <div class="form-group">
                        <label>Logotipo</label>
                        <input type="file"  value = "{{ $hospitais->logotipo }}" name ="logotipo" class="form-control">
                     </div>
                     @error('logotipo')
                        <span style ="color: red" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                     <div class="form-group">
                        <label>

                           @if($hospitais->documentos()->first()->documento)
                           <a target = "_blank" 
                              href="{{ asset($hospitais->documentos()->first()->documento) }}">
                              Documento Legal
                           </a>
                           @else
                             Documento Legal
                           @endif
                          
                        </label>
                        <input type="file" name ="documento" class="form-control">
                     </div>
                     @error('documento')
                        <span style ="color: red" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                     <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                     </div>
                     </div>
                    
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> 
@endif     
<input id ="test" type = "hidden">
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
 
<script>
       $(document).ready(function() {
        // Seletor jQuery para o elemento de seleção múltipla
         $('#servicos').select2();
      });
      $(document).ready(function() {
         // Seletor jQuery para o elemento de seleção múltipla
         $('#areas').select2();
      });
      $(document).ready(function() {
        // Seletor jQuery para o elemento de seleção múltipla
        $('#servicos2').select2();
    });
    $(document).ready(function() {
        // Seletor jQuery para o elemento de seleção múltipla
        $('#areas2').select2();
    });
    $(document).ready(function() {
        // Seletor jQuery para o elemento de seleção múltipla
        $('#servicos3').select2();
    });
    $(document).ready(function() {
        // Seletor jQuery para o elemento de seleção múltipla
        $('#areas3').select2();
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk&libraries=places"></script>
<script>
//PEGAR LOCALIZAÇÃO AO ESCREVER
var test = document.querySelector('#test');
var typingTimer;
var lat = document.getElementById('lat');
var long = document.getElementById('long');
var doneTypingInterval = 500; // Intervalo em milissegundos após o usuário terminar de digitar
var addressInput = document.querySelector('#address_input');
var errorText = document.getElementById('errorText');
test.addEventListener('input', function(){
 console.log("TESTE:",test);
});
// Função para inicializar o serviço de Geocodificação do Google Maps
function initializeGeocoder() {
  geocoder = new google.maps.Geocoder();
  console.log(addressInput);
 
}
addressInput.addEventListener('input', function(){
  console.log("AQUIII - 22222!!");
 
  clearTimeout(typingTimer);
  console.log(addressInput)
  typingTimer = setTimeout(getCoordinates, doneTypingInterval);
});

// Chamada da função de inicialização do Geocodificador
google.maps.event.addDomListener(window, 'load', initializeGeocoder());

function getCoordinates() {
  var address = addressInput.value;
  // Criação de um objeto GeocoderRequest
  var geocoderRequest = {
    address: address
  };

  // Chamada da função geocode do Geocoder do Google Maps
  geocoder.geocode(geocoderRequest, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK && results.length > 0) {
      var latitude = results[0].geometry.location.lat();
      var longitude = results[0].geometry.location.lng();
      lat.value = latitude;
      long.value = longitude;
      console.log(latitude, longitude);
      addressInput.classList.remove('is-invalid');
      addressInput.classList.add('is-valid');
      errorText.textContent = ""; // Limpa a mensagem de erro
    } else {
      console.log('Endereço inválido. Por favor, insira um endereço válido.');
      lat.value = '';
      long.value = '';
      addressInput.classList.remove('is-valid');
      addressInput.classList.add('is-invalid');
      errorText.style.color = "red";
      errorText.textContent = "Por favor, insira um endereço válido.";
    }
  });
}
 </script> 

@endsection
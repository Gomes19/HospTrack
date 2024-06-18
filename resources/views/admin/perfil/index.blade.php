@extends('layouts.admin.index')
@section('title','Perfil')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">

<div class="row">
<div class="col-lg-12">
    <div class="card">
         <div class="card-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
               <div class="d-flex flex-wrap align-items-center">
                  <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                    @if(Auth::user()->vc_path == null)
                     <img src="{{ asset('assets/images/avatars/01.png') }}" alt="User-Profile" class="theme-color-grey-img img-fluid rounded-pill avatar-100"  loading="lazy">
                    @else
                    <img src="{{ asset($user->vc_path) }}" alt="User-Profile" class="theme-color-grey-img img-fluid rounded-pill avatar-100" loading="lazy">
                    @endif
                  </div>
                  <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                     <h4 class="me-2 h4">{{ Auth::user()->name }} {{ Auth::user()->sobrename }}</h4>
                     <span> - 
                        @if(Auth::user()->it_tipo_utilizador == 1)
                          Administrador 
                          @elseif(Auth::user()->hospital()->first()->pivot->cargo == 1)
                           Marc. ponto
                        @elseif(Auth::user()->hospital()->first()->pivot->cargo == 0)
                          Admin Hospital  
                        @else 
                        Indefinido 
                        @endif
                     </span>
                  </div>
               </div>
               
            </div>
         </div>
    </div>
 </div>
 <div class="col-sm-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
          <div class="header-title">
             <h4 class="card-title">Editar Perfil</h4>
          </div>
     
       </div>
       <div class="card-body">
        <form action="{{ route('perfil.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value = "{{ $user->it_tipo_utilizador }}" name = "it_tipo_utilizador">
        <div class="row">
            <div class="col-lg-6">
               <div class="form-group">
               <label for="name" class="form-label">Nome</label>
               <input type="text" class="form-control" name="name" required id="name" placeholder="Primeiro Nome" value="{{ Auth::user()->name }}">
               </div>
               </div>
                  
                    <div class="col-lg-6">
                     <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}"required autocomplete="email" id="email" aria-describedby="email" placeholder="xyz@example.com">
                        @error('email')
                        <span class="invalid-feedback form-control" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                       </div>
                  </div>
               
          <div class="form-group col-md-6">
             <label for="vc_path">Genêro</label>
                <select name="genero" id="" class="form-control">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
          </div>
          <div class="form-group col-md-6 ">
                <label for="vc_path">Imagem</label>
                 <input type="file" id="vc_path" class="form-control" name="vc_path"
                     placeholder="vc_path" value=""> 
         </div>
          <div class="form-group col-md-6">
             <label for="vc_path">Password</label>
                <input type="password" id="password" class="form-control" name="password"
                    placeholder="***" >
          </div>
          <div class="form-group col-md-6">
             <label for="vc_path">Confirmar Password</label>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                    placeholder="***" >
          </div>
         
          
         
           </div>
         <input type="submit" class="btn btn-primary" value="Salvar Alterações">
      </div>
     
      </div>
      
      </form> 
          </div>
       </div>
    </div>
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
       

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tipoEstabelecimentoSelect = document.getElementById("tipo_estabelecimento");
        const divEmpresa = document.querySelector(".empresa");
        const divIndividual = document.querySelector(".individual");
    
        // Adicione um ouvinte de evento para detectar mudanças na seleção
        tipoEstabelecimentoSelect.addEventListener("change", function() {
            if (tipoEstabelecimentoSelect.value === "1") {
                // Se "Empresa" for selecionado, exiba a div "empresa" e oculte a div "individual"
                divEmpresa.style.display = "block";
                divIndividual.style.display = "none";
            } else if (tipoEstabelecimentoSelect.value === "2") {
                // Se "Individual" for selecionado, exiba a div "individual" e oculte a div "empresa"
                divEmpresa.style.display = "none";
                divIndividual.style.display = "block";
            } else {
                // Se "Selecione o Tipo de Empresa" for selecionado, oculte ambas as divs
                divEmpresa.style.display = "none";
                divIndividual.style.display = "none";
            }
        });
    });
    </script>
@endsection
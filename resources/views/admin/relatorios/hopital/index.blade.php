@extends('layouts.admin.index')
@section('title', 'Relatorio')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Hospitais</h4>
                </div>
                
                <div>
                    <a class="btn btn-primary mt-2" href = "#" target = "_blank" onclick = "formSubmit()">Gerar Relatório
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M3 6H5V8H3V6ZM3 10H5V12H3V10ZM3 14H5V16H3V14ZM8 6H21V8H8V6ZM8 10H21V12H8V10ZM8 14H21V16H8V14Z" fill="currentColor"/>
                        </svg>  
                    </a>
                     <script>
                        function formSubmit() {
                           var formLogout = document.getElementById("formRelatorio");
                           formLogout.submit(); 
                        }
                     </script>
                </div>
             </div>
             <div class="card-body">
               
                <div class="table-responsive">
                  <form action="{{ route('relatorio.hospital.pdf') }}" id="formRelatorio" method ="post">
                        @csrf
                        <div class = "row" style = " width:100% ">
                           <div class = "col-lg-6">
                              <div class="form-group">
                                 <label>Data de inicio</label>
                                 <input type="date" class ="form-control" name ="inicio">
                              </div>
                              @error('inicio')
                              <p style = "color: red">{{ $message }}</p>
                              @enderror
                           </div>
                           
                           <div class = "col-lg-6">
                              <div class="form-group">
                                 <label>Data de Término</label>
                                 <input type="date" class ="form-control" name ="fim">
                              </div>
                              @error('fim')
                              <p style = "color: red">{{ $message }}</p>
                              @enderror
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
       
 
@endsection
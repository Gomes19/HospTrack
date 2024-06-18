@extends('layouts.auth.index')
@section('title', 'Registrar')
@section('conteudo')
<div class="wrapper">
      <section class="login-content overflow-hidden">
         <div class="row no-gutters align-items-center bg-white">            
            <div class="col-md-12 col-lg-7 align-self-center"> 
               <div class="row justify-content-center">
                  <div class="col-md-12 col-lg-7 align-self-center"> 
                        <a href="#" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
                        <div class="logo-normal">
                          <img src="{{asset('site_temp/images/logo-3.png')}}" alt="logo">
                        </div>
                        </a>  
                  </div>
                  <div class="col-md-9">
                     <div class="card auth-card  d-flex justify-content-center mb-0">
                        <div class="card-body">
                           <h2 class="mb-2 text-center">Registre-se</h2>
                           <p class="text-center">Crie uma conta e registre um hospital</p>
                           <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                           @csrf
                           <div class="row">
                            <h4>Seus Dados</h4>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class ="form-label">Nome</label>
                                    <input type="text" class= "form-control" name="name" placeholder="Nome" required>
                                </div>
                                @error('name')
                                    <span style ="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           <div class="col-lg-6">
                                <div class="form-group">
                                    <label class ="form-label">Email</label>
                                    <input type="email" class ="form-control" name="email" placeholder="Email" required>
                                </div>
                                @error('email')
                                    <span style ="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class ="form-label">Password</label>
                                    <input type="password" class ="form-control"  name="password" placeholder="Password" required>
                                </div>
                                @error('password')
                                        <span style ="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class ="form-label" >Confirmar Password</label>
                                    <input type="password" class ="form-control" name="password_confirmation" placeholder="Confirmar Password" required>
                                </div>
                                @error('password_confirmation')
                                        <span style ="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <h4>Dados do Hospital</h4>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class= "form-label" >Nome</label>
                                    <input type="text" class= "form-control"  name="hospital_name" placeholder="Nome" required>
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
                                    <input type="text" class ="form-control" name ="endereco" id ="address_input" class="form-control" required>
                                    
                                    <input type="hidden" name ="lat" id ="lat">
                                    <input type="hidden" name ="long" id= "long">
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
                                            @foreach($hospital_tipos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->vc_nome }}</option>
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
                                            @foreach($hospital_areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->vc_nome }}</option>
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
                                            @foreach($hospital_servicos as $servico)
                                            <option value="{{ $servico->id }}">{{ $servico->vc_nome }}</option>
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
                                <textarea name="descricao" id="" cols="15" rows="10" class ="form-control" ></textarea>
                            </div>
                            @error('descricao')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Logotipo</label>
                                <input type="file" name ="logotipo" class="form-control" required>
                            </div>
                            @error('logotipo')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Documento Legal</label>
                                <input type="file" name ="documento" class="form-control" required>
                            </div>
                            @error('documento')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                            </div>
                              <p class="mt-3 text-center">
                                 Já tem uma conta? <a href="{{ route('login') }}" class="text-underline">Login</a>
                              </p>
                           </form>
                        </div>
                     </div>    
                  </div>
               </div>           
            </div>
             <div class="col-lg-5 d-lg-block d-none p-0  overflow-hidden" style ="height: 200vh;">
               <img src="{{asset('site_temp/img/medico-de-tiro-medio-calcando-luvas.jpg')}}" class="img-fluid gradient-main" alt="images" loading="lazy" width = "100%" height= "100%" >
            </div>
         </div>
      </section>
    </div> 
    <input type="hidden" name="test" id="test">
<script>
    $(document).ready(function() {
        // Seletor jQuery para o elemento de seleção múltipla
        $('#servicos').select2();
    });
    $(document).ready(function() {
        // Seletor jQuery para o elemento de seleção múltipla
        $('#areas').select2();
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
  //console.log("AQUIII - 22222!!");
  clearTimeout(typingTimer);
  //console.log(addressInput)
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
      errorText.textContent = "";
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




{{--    <!--Page Title-->
    <section class="page-title" style="background-image: url({{ asset('site_temp/img/banner-medico-com-medico-usando-oculos.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Registrar</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Registrar</li>
                </ul> 
            </div>
        </div>
    </section>
    <!--End Page Title-->

<section class="login-section">
        <div class="auto-container">
            <div class="row">
                <div class="column col-lg-12 col-md-12 col-sm-12">
                    
                    <!-- Register Form -->
                    <div class="login-form register-form">
                        <h2>Registrar</h2>
                        <!--Login Form-->
                        <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                           @csrf
                            <h4>Seus Dados</h4>
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="name" placeholder="Nome" required>
                            </div>
                            @error('name')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            @error('email')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            @error('password')
                                    <span style ="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group">
                                <label>Confirmar Password</label>
                                <input type="password" name="password_confirmation" placeholder="Confirmar Password" required>
                            </div>
                            @error('password_confirmation')
                                    <span style ="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <h4>Dados do Hospital</h4>
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="hospital_name" placeholder="Nome" required>
                            </div>
                            @error('hospital_name')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Tipo de Hospital</label>
                                <select name ="hospital_type" class ="form-control">
                                        <option value="">--Selecione um tipo</option>
                                        @foreach($hospital_tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->vc_nome }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            @error('hospital_type')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Areas Diponíveis</label>
                                <select name ="hospital_area[]" class ="form-control" multiple>
                                        @foreach($hospital_areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->vc_nome }}</option>
                                        @endforeach
                                </select>
                            </div>
                            @error('hospital_area')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Endereço</label>
                                <input type="text" name ="endereco" id ="address_input" class="form-control" required>
                                
                                <input type="hidden" name ="lat" id ="lat">
                                <input type="hidden" name ="long" id= "long">
                            </div>
                            @error('endereco')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea name="descricao" id="" cols="15" rows="10" class ="form-control" ></textarea>
                            </div>
                            @error('descricao')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Logotipo</label>
                                <input type="file" name ="logotipo" class="form-control" required>
                            </div>
                            @error('logotipo')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <label>Documento Legal</label>
                                <input type="file" name ="documento" class="form-control" required>
                            </div>
                            @error('documento')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group text-right">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Registrar</span></button>
                            </div>
                        </form>      
                    </div>
                    <!--End Register Form -->
                </div>
            </div>
        </div>
     
</section>  
--}}
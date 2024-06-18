@extends('layouts.admin.index')
@section('title', 'Hospital')
@section('conteudo')

<div class="content-inner container-fluid pb-0" id="page_layout">
    
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
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
       </div>
       </div>
    </div> 
</div>

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
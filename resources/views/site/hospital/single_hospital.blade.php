@extends('layouts.site.index')
@section('title', 'Hospitais')
@section('conteudo') 
 <!--Page Title-->
 <section class="page-title" style="background-image: url({{asset('site_temp/img/banner-medico-com-medico-usando-oculos.jpg')}});">
        <div class="auto-container">
            <div class="title-outer">            
                <h1>{{ $hospital->nome }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ $hospital->nome }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

              
    <!-- Team Section Two -->
    <section class="team-section-two alternate">
        <div style ="margin-bottom: 2rem; margin-left : 20%; margin-right : 20%">
          <h4> Você está há <span id ="distance">... km</span> de distância do hospital </h4>
        </div>
        <div class="auto-container">
            <div id ="map" style =" width: 100%; height:400px"></div>
        </div>
    </section>
    <!--End Team Section -->

    <!-- Skill Section -->
    <section class="skill-section">
        <div class="outer-container clearfix">
            <div class="skill-column">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">{{ $hospital->tipo()->first()->vc_nome }}</span>
                        <h2>{{ $hospital->nome }}</h2>
                        <span class="divider"></span>
                        <div class="text">{{ $hospital->descricao }}</div>
                    </div>

                    <!--Skills-->
                    <div class="skills">
                        @foreach($hospital->areas()->get() as $area)
                        <!--Skill Item-->
                        <div class="skill-item">
                            <div class="skill-header clearfix">
                                <div class="skill-title">{{ $area->vc_nome }}</div>
                                <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="3000" data-stop="55">0</span>%</div></div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner"><div class="bar progress-line" data-width="55"></div></div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="btn-box"><a href="#" class="theme-btn btn-style-three"><span class="btn-title">Love</span></a></div>
                </div>
            </div>

            <div class="image-column" style="background-image: url({{ $hospital->logotipo }});">
                <div class="image-box">
                    <figure class="image"><img src="images/resource/image-7.jpg" alt=""></figure>
                </div>
            </div>
        </div>
    </section>
    <!--End Skill Section -->
    
    <!-- Clients Section -->
    <section class="clients-section">
        <div class="auto-container">

            <!-- Sponsors Outer -->
            <div class="sponsors-outer">
                <!--clients carousel-->
                <ul class="clients-carousel owl-carousel owl-theme">
                    @foreach($hospital->medicos()->get() as $medico)
                    <li class="slide-item"> <a href="#"><img src="{{ $medico->vc_path }}" alt=""></a> </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!--End Clients Section -->

    <!---<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk&libraries=places"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk&libraries=places"></script>

<script>

function pegar_minha_localizacao() {
  let lat;
  let long;
  var lat2 = {{ $hospital->lat }}; 
  var long2 = {{ $hospital->long }};
  function success(pos) {
    lat = pos.coords.latitude;
    long = pos.coords.longitude;
    
   // calculateAndDisplayRoute(lat,long,-8.8630933, 13.323073632735849);
    var geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(lat, long);
    var  address = ''
    geocoder.geocode({ 'latLng': latlng }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          address = results[0].formatted_address;
            calculateAndDisplayRoute(lat, long, lat2, long2);
            console.log(address)
        } else {
          console.log('Endereço não encontrado.');
        }
      } else {
        console.log('Erro ao obter o endereço:', status);
      }
    });
  }

  function error(err) {
    console.log(err);
  }

  var watchID = navigator.geolocation.getCurrentPosition(success, error, {
    enableHighAccuracy: true
  });
  //navigator.geolocation.clearWatch(watchID); // Para o acompanhamento anterior
}

// Função para inicializar o serviço de Geocodificação do Google Maps
function initializeGeocoder() {

  geocoder = new google.maps.Geocoder();
}

// Chamada da função de inicialização do Geocodificador
google.maps.event.addDomListener(window, 'load', initializeGeocoder(), pegar_minha_localizacao());

//TRAÇAR ROTAS
  var map;
  var directionsService;
  var directionsDisplay;
  var originMarker;
  var destinationMarker;
  var carMarker;
  var lat2 = {{ $hospital->lat }}; 
  var long2 = {{ $hospital->long }};
  var distanceInput = document.getElementById("distance");

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 0, lng: 0},
      zoom: 14
    });

    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);
    console.log('Diretion service: ', directionsService);
   // directionsService.originMarker.setMap(null);
   // directionsService.destinationMarker.setMap(null);
    var hospitalIcon = {
      url: '{{asset('hospital.png')}}', // Substitua pelo caminho para o ícone de casa
      scaledSize: new google.maps.Size(40, 40)
    };

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var lat1 = position.coords.latitude;
        var long1 = position.coords.longitude;
        //console.log("CHEGOU!!")
        originMarker = new google.maps.Marker({
          position: {lat: lat1, lng: long1},
          map: map,
        });
        destinationMarker = new google.maps.Marker({
          position: {lat: lat2, lng: long2},
          map: map,
          icon: hospitalIcon
        });
        var content = '<p style="color:black; font-size:13px; padding:10px; border-bottom:1px solid black"> {{$hospital->endereco}} </p>';
        
        var infoWindow = new google.maps.InfoWindow({
              content: content,
              maxWidth: 200,
              pixelOffset: new google.maps.Size(0, 20)
          });
         
              google.maps.event.addListener(destinationMarker, 'click', function () {
                  infoWindow.open(map, destinationMarker);
              });
      
          
        var content2 = '<p style="color:black; font-size:13px; padding:10px; border-bottom:1px solid black"> Você está aqui </p>';
        var infoWindow = new google.maps.InfoWindow({
              content: content2,
              maxWidth: 200,
              pixelOffset: new google.maps.Size(0, 20)
          });
         
        google.maps.event.addListener(originMarker, 'click', function () {
            infoWindow.open(map, originMarker);
        });
   

        setInterval(function () {
          updateMarkerPosition(lat1, long1);
        }, 3000); // Atualiza a posição do marcador a cada 1 segundo
      }, function (error) {
        console.log(error);
      }, {enableHighAccuracy: true});
    } else {
      console.log('Geolocation is not supported by this browser.');
    }
  }


  function calculateAndDisplayRoute(lat1, long1, lat2, long2) {
    var request = {
      origin: new google.maps.LatLng(lat1, long1),
      destination: new google.maps.LatLng(lat2, long2),
      travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (result, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(result);
        var route = result.routes[0];
        var distance = 0;

        for (var i = 0; i < route.legs.length; i++) {

          distance += route.legs[i].distance.value;
           distanceInput.innerHTML = (distance / 1000) + 'km';
           distanceInput.style.color = "#20c997"
        }

        console.log('Distance:', distance + ' meters');
      } else {
        console.log('Directions request failed. Status:', status);
      }
    });
  }

  function updateMarkerPosition(lat1, long1) {
    originMarker.setPosition(new google.maps.LatLng(lat1, long1));
  }

  initMap();
</script>
@endsection
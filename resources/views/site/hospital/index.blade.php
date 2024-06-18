@extends('layouts.site.index')
@section('title', 'Hospitais')
@section('conteudo')
     <!--Page Title-->
     <section class="page-title" style="background-image: url({{ asset('site_temp/img/medico-de-tiro-medio-usando-mascara-facial.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Hospitais</h1>
                <ul class="page-breadcrumb">
                    <li><a href="#"style = "color: #fff" >Todos os hospitais cadastrados e admitidos</a></li>   
                </ul> 
            </div>
        </div>
    </section>
    <!--End Page Title-->

     <!-- Services Section -->
    <section class="services-section-two">
        <div class="auto-container">

            <div class="carousel-outer">
				<div class="row">
                    @forEach($hospitais as $hospital)
                    <!-- service Block -->
                    <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href=""><img src="{{$hospital->logotipo}}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <div class="title-box">
                                   <!-- <span class="icon flaticon-heart-2"></span>-->
                                    <h4><a href="#">{{ $hospital->nome }}</a></h4> 
                                </div>
                                <div class="text">{{ $hospital->descricao }}</div>
                                <p><a href="{{ route('site.hospital.show',$hospital->id ) }}" class="theme-btn btn-style-one small"><span class="btn-title">Mais detalhes...</span><span></span> <span></span> <span></span> <span></span> <span></span></a></p>
                                <span class="icon-right flaticon-heart-2"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>      
            </div>
        </div>
    </section>
        <!--Google maps-->

  <div id="map"></div>

<!--Google maps end-->

<!-- End service Section -->
<!--
<script>
  (g => {
      var h, a, k, p = "The Google Maps JavaScript API",
          c = "google",
          l = "importLibrary",
          q = "__ib__",
          m = document,
          b = window;
      b = b[c] || (b[c] = {});
      var d = b.maps || (b.maps = {}),
          r = new Set,
          e = new URLSearchParams,
          u = () => h || (h = new Promise(async (f, n) => {
          await (a = m.createElement("script"));
          e.set("libraries", [...r] + "");
          for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
          e.set("callback", c + ".maps." + q);
          a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
          d[q] = f;
          a.onerror = () => h = n(Error(p + " could not load."));
          a.nonce = m.querySelector("script[nonce]")?.nonce || "";
          m.head.append(a)
      }));
      d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
  })({
      key: "AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk",
      v: "weekly"
  });
</script>
-->
<script type="module">
  let map;

  async function initMap() {
      let lat, long;
      function success(pos) {
          lat = pos.coords.latitude;
          long = pos.coords.longitude;
          
          map = new google.maps.Map(document.getElementById("map"), {
              center: { lat: lat, lng: long },
              zoom: 14,
          });
       
          AddMarker(lat, long, '', '<p style="color:black; font-size:13px; padding:10px; border-bottom:1px solid black">Você está aqui</p>', true);
          
          var hospitais = {!! json_encode($hospitais) !!};
          hospitais.forEach(function (hospital) {
           
          var conteudo2 = '<p style="color:black; font-size:13px; padding:10px; border-bottom:1px solid black">' + hospital.endereco + '</p>';
          AddMarker(hospital.lat, hospital.long, '{{asset('hospital.png')}}',conteudo2, true);
          console.log("content:", conteudo2);   
      });
      }
      function error(err) {
        var hospitais = {!! json_encode($hospitais) !!};
      hospitais.forEach(function (hospital) {
          var conteudo2 = '<p style="color:black; font-size:13px; padding:10px; border-bottom:1px solid black">' + hospital.endereco + '</p>';
          AddMarker(hospital.lat, hospital.long,'', conteudo2, true);        
        });
          console.log(err);
      }
      var wacthID = navigator.geolocation.watchPosition(success, error, {
          enableHighAccuracy: true
      });

     

      async function AddMarker(lat, long, icon, content, click) {
          var lating = { 'lat': lat, 'lng': long };
          var marker = new google.maps.Marker({
              position: lating,
              map: map,
              icon: icon
          });
          var infoWindow = new google.maps.InfoWindow({
              content: content,
              maxWidth: 200,
              pixelOffset: new google.maps.Size(0, 20)
          });
          if (click) {
              google.maps.event.addListener(marker, 'click', function () {
                  infoWindow.open(map, marker);
              });
          }
      }
  }
  // Chamar initMap após a carga da API do Google Maps
  google.maps.importLibrary("maps").then(initMap);
</script>
<!-- JavaScript -->


@endsection
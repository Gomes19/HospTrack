<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ary-themes.com/html/bold_touch/medicoz/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 05:59:22 GMT -->
<head>
<meta charset="utf-8">
<title>@yield('title')</title>

<!-- Stylesheets -->
<link href="{{asset('site_temp/css/bootstrap.css')}}" rel="stylesheet">

<link href="{{asset('site_temp/css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('site_temp/css/style.css')}}" rel="stylesheet">
<link href="{{asset('site_temp/css/responsive.css')}}" rel="stylesheet">
<!--Color Themes-->
<link id="theme-color-file" href="{{asset('site_temp/css/color-themes/tealblue.css')}}" rel="stylesheet">

<!--Color Switcher Mockup-->
<link href="{{asset('site_temp/css/color-switcher-design.css')}}" rel="stylesheet">

<link rel="shortcut icon" href="{{asset('site_temp/img/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('site_temp/img/favicon.png" type="image/x-icon">
 <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js')}}"></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('site_temp/js/respond.js')}}"></script><![endif]-->
<style>
      #map {
        width: 100%;
        height: 600px;
      }
</style>
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    @include('layouts.site.header')
    @yield('conteudo')
    @include('layouts.site.footer')
</div>
<!-- End Page Wrapper -->

<script src="{{asset('site_temp/js/jquery.js')}}"></script>  
<script src="{{asset('site_temp/js/popper.min.js')}}"></script>
<script src="{{asset('site_temp/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site_temp/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('site_temp/js/jquery.modal.min.js')}}"></script>
<script src="{{asset('site_temp/js/mmenu.polyfills.js')}}"></script>
<script src="{{asset('site_temp/js/mmenu.js')}}"></script>
<script src="{{asset('site_temp/js/appear.js')}}"></script>
<script src="{{asset('site_temp/js/mixitup.js')}}"></script>
<script src="{{asset('site_temp/js/owl.js')}}"></script>
<script src="{{asset('site_temp/js/wow.js')}}"></script>
<script src="{{asset('site_temp/js/script.js')}}"></script>
 <script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
          ({key: "AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk", v: "weekly"});    
</script> 
<!-- Color Setting -->
<!---- <script src="{{asset('site_temp/js/color-settings.js')}}"></script> ---->
</body>

<!-- Mirrored from ary-themes.com/html/bold_touch/medicoz/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 06:00:56 GMT -->
</html>




<!DOCTYPE html>
<html lang="en">
@include('layouts.auth.header')
<body class="theme-color-gray">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<div id="loading">
    <div class="loader simple-loader">
        <div class="loader-body ">
            <img src="{{asset('site_temp/images/logo-3.png')}}" alt="loader" class="image-loader img-fluid ">
        </div>
    </div>
    </div>
    <!-- loader END -->
         @yield('conteudo')    
    @include('layouts.auth.footer')
</body>

</html>

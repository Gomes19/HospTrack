@extends('layouts.site.index')
@section('title', 'Hospitais')
@section('conteudo')
     <!--Page Title-->
     <section class="page-title" style="background-image: url({{ asset('site_temp/img/medico-1.jpeg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Areas</h1>
                <ul class="page-breadcrumb">
                    <li><a href="#">Selecioone uma area para ver os hospitais relacionados com a area selecionadas.</a></li>   
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
                    @foreach($hospitalArea as $area)
                    <!-- service Block -->
                    <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="department-of-pathology.html"><img src="images/resource/service-13.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <div class="title-box">
                                   
                                    <h4><a href="{{ route('site.hospital', $area->id) }}">{{ $area->vc_nome }}</a></h4> 
                                </div>
                                <div class="text"> </div><p><a href="{{ route('site.hospital', $area->id) }}" class="theme-btn btn-style-one small"><span class="btn-title">Ver hospitais...</span><span></span> <span></span> <span></span> <span></span> <span></span></a></p>
                                <span class="icon-right flaticon-heart-2"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>      
            </div>
        </div>
    </section>
    <!-- End service Section -->
@endsection
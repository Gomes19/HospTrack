@extends('layouts.site.index')
@section('title', 'Home')
@section('conteudo')
 <!-- Bnner Section -->
 <section class="banner-section">
        <div class="banner-carousel owl-carousel owl-theme default-arrows dark">
            <!-- Slide Item -->
            <div class="slide-item" style="background-image: url({{asset('site_temp/img/banner-medico-com-medico-usando-oculos.jpg')}});">
                <div class="auto-container">
                    <div class="content-outer">
                        <div class="content-box">
                            <span class="title">Seja bem-vindo(a)!</span>
                            <h2>Nós iremos fornecer os<span> dados</span> sobre algum hospital que precise ir</h2>
                            <div class="text">Pesquise e veja no mapa os hospitais mais próximos de você.</div>
                            <div class="btn-box"><a href="#" class="theme-btn btn-style-one bg-tealblue"><span class="btn-title">Sobre Nós</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide Item -->
            <div class="slide-item" style="background-image: url({{asset('site_temp/img/medico-de-tiro-medio-calcando-luvas.jpg')}});">
                <div class="auto-container">
                    <div class="content-outer">
                        <div class="content-box">
                            <span class="title">Seja bem-vindo(a)!</span>
                            <h2>Pesquise e veja no <span>mapa</span> os hospitais mais próximos de você. </h2>
                            <div class="text">Nós iremos fornecer os dados sobre algum hospital que precise ir</div>
                            <div class="btn-box"><a href="#" class="theme-btn btn-style-one bg-tealblue"><span class="btn-title">Sobre Nós</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Bnner Section -->

    <!-- About Section Two -->
    <section class="about-section-two">
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="sub-title"></span>
                            <h2>Encontre aqui</h2>
                            <span class="divider"></span>
                            <p>Encontre os hospitais mais proximos de si.</p>
                        </div>

                        <div class="row">
                            <!-- Feature BLock -->
                            <div class="feature-block-two col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon fa fa-stethoscope"></span>
                                    <h4>Tratamento Médico</h4>
                                    <p>Estamos aqui para o ajudar a encontrar o hospital mais próximo de si com o tratamento que precisa.</p>
                                </div>
                            </div>

                            <!-- Feature BLock -->
                            <div class="feature-block-two col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon fa fa-ambulance"></span>
                                    <h4>Ajuda para emergência</h4>
                                    <p>Quando tiver alguma emergência e não saber onde está o hospital para atender a sua emergência especifica, encontre aqui.</p>
                                </div>
                            </div>

                            <!-- Feature BLock -->
                            <div class="feature-block-two col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon fa fa-user-md"></span>
                                    <h4>Hospitais qualificados</h4>
                                    <p>Selecionamos aqui hospitais qualificados para poderem atender você com máximo profissionalismo</p>
                                </div>
                            </div>

                            <!-- Feature BLock -->
                            <div class="feature-block-two col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon fa fa-first-aid"></span>
                                    <h4>Profissionais qualificados</h4>
                                    <p>Selecionamos aqui hospitais com profissionais qualificados para poderem atender você com máximo profissionalismo</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Images Column -->
                <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                    <div class="image-box">
                        <figure class="image"><img src="site_temp/img/medico-de-tiro-medio-usando-mascara-facial.jpg" alt=""></figure>
                        <div class="icon-box"><span class="icon flaticon-doctor"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section Two -->

    <!-- Fun Fact Section Two-->
    <section class="fun-fact-section-two">
        <div class="auto-container">
            <div class="row">
                <!--Column-->
                <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="count-box">
                        <div class="icon-box"><span class="icon flaticon-user-experience"></span></div>
                        <h4 class="counter-title">Anos de experiência</h4>
                        <span class="count-text" data-speed="3000" data-stop="25">0</span>
                    </div>
                </div>

                <!--Column-->
                <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="count-box">
                        <div class="icon-box"><span class="icon flaticon-team"></span></div>
                        <h4 class="counter-title">Profissionais qualificados</h4>
                        <span class="count-text" data-speed="3000" data-stop="470">0</span>
                    </div>
                </div>

                <!--Column-->
                <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                    <div class="count-box">
                        <div class="icon-box"><span class="icon flaticon-hospital"></span></div>
                        <h4 class="counter-title">Hospitais qualificados</h4>
                        <span class="count-text" data-speed="3000" data-stop="689">0</span>
                    </div>
                </div>

                <!--Column-->
                <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                    <div class="count-box">
                        <div class="icon-box"><span class="icon flaticon-add-friend"></span></div>
                        <h4 class="counter-title">Pacientes satisfeitos</h4>
                        <span class="count-text" data-speed="3000" data-stop="9036">0</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fun Fact Section Two -->

    <!-- Services Section -->
    <section class="services-section-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="sub-title">Areas disponíveis</span>
                <h2>As áreas diponíveis em cada hospital</h2>
                <span class="divider"></span>
            </div>

            <div class="carousel-outer">
                <!-- Services Carousel -->
                <div class="services-carousel owl-carousel owl-theme">
                   @foreach($hospital_areas as $area)
                    <!-- service Block -->
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="#"><img src="{{ asset($area->vc_path) }}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <div class="title-box">
                                  {{--  <span class="icon flaticon-heart-2"></span> --}}
                                    <h4><a href="{{ route('site.hospital', $area->id) }}">{{ $area->vc_nome }}</a></h4> 
                                </div>
                                <div class="text">{{ $area->descricao }}</div>
                                <span class="icon-right flaticon-heart-2"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 
                    
           {{-- <div class="sec-bottom-text">Don’t hesitate, contact us for better help and services <a href="#">Explore all Dr. Team</a></div> --}}

        </div>
    </section>
    <!-- End service Section -->

    
    <!-- Appointment Form Section -->
    <section class="appointment-form-section" style="background-image: url(site_temp/img/background/3.jpg);">
        <div class="auto-container">
            <div class="row">

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <a href="#" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button" aria-hidden="true"></i><span class="ripple"></span></a>

                        <div class="content">
                            <span class="title">Quer ter o seu hospital no nosso site?</span>
                            <h3>Registre-o aqui<br> e já está!</h3>
                            <div class="text">Ou ligue se tiver problemas ao cadastrar:<strong>9xx xxx xxx</strong></div>
                            <a href="{{route('register')}}" class="theme-btn btn-style-three"><span class="btn-title">Registrar hospital</span></a>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    <!--End Appointment Form Section -->

    
    
    <!-- Clients Section -->
    <section class="clients-section">
        <div class="auto-container">

            <!-- Sponsors Outer -->
            <div class="sponsors-outer">
                <!--clients carousel-->
                <ul class="clients-carousel owl-carousel owl-theme">
                    <li class="slide-item"> <a href="#"><img src="site_temp/img/clients/1.png" alt=""></a> </li>
                    <li class="slide-item"> <a href="#"><img src="site_temp/img/clients/2.png" alt=""></a> </li>
                    <li class="slide-item"> <a href="#"><img src="site_temp/img/clients/3.png" alt=""></a> </li>
                    <li class="slide-item"> <a href="#"><img src="site_temp/img/clients/4.png" alt=""></a> </li>
                    <li class="slide-item"> <a href="#"><img src="site_temp/img/clients/5.png" alt=""></a> </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Clients Section -->
@endsection

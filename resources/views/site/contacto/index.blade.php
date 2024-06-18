@extends('layouts.site.index')
@section('title', 'Contacto')
@section('conteudo')

    <!--Page Title-->
    <section class="page-title" style="background-image: url(site_temp/img/banner-medico-com-medico-usando-oculos.jpg);">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Contacte-nos</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.home') }}">Home</a></li>
                    <li>Contacto</li>
                </ul> 
            </div>
        </div>
    </section>
    <!--End Page Title-->
<section class="contact-section" id="contact">
        <div class="small-container">
            <div class="sec-title text-center">
                <h2><p><b>CORONA HELPDESK NO : 01123905635 / 01123905703 / 01123905839 (01123905795 NODAL OFFICER)</b></p></h2>
                <span class="divider"></span>
            </div>

            <!-- Contact box -->
            <div class="contact-box">
                <div class="row">
                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <span class="icon flaticon-worldwide"></span> 
                            <h4><strong>Endereço</strong></h4>
                            <p>SmartBits, Luanda, Angola</p>
                        </div>
                    </div>

                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <span class="icon flaticon-phone"></span> 
                            <h4><strong>Telefone</strong></h4>
                            <p><a href="#">999-999-999</a></p>
							
                            
                        </div>
                    </div>

                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <span class="icon flaticon-email"></span> 
                            <h4><strong>Email</strong></h4>
                            <p><a href="mailto:ms-hindurao@mcd.nic.in">hospital@app.com</a></p>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form box -->
            
        </div>
    </section>
    <!-- Map Section -->
    <section class="map-section">
        <div class="auto-container">
            <div class="map-outer">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.472678253133!2d77.20859931508355!3d28.6755038824009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd9bea362623%3A0x937371fce694df85!2sHindu%20Rao%20Hospital!5e0!3m2!1sen!2sin!4v1647235563933!5m2!1sen!2sin" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
    <!-- End Map Section -->


        <!--Tab -->
        
        
        <!--Tab-->
    </section>
    </div>

@endsection
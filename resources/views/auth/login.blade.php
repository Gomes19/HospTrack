@extends('layouts.auth.index')
@section('title', 'Login')
@section('conteudo')
   <div class="wrapper">
      <section class="login-content overflow-hidden">
         <div class="row no-gutters align-items-center bg-white">            
            <div class="col-md-12 col-lg-6 align-self-center">
               <a href="#" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
                  <div class="logo-normal">
                    <img src="{{asset('site_temp/images/logo-3.png')}}" alt="logo">
                  </div>
                 <!-- <h2 class="logo-title ms-3 mb-0" >Medicoz</h2>-->
               </a>
               <div class="row justify-content-center pt-5">
                  <div class="col-md-9">
                     <div class="card  d-flex justify-content-center mb-0 auth-card iq-auth-form">
                        <div class="card-body">                          
                           <h2 class="mb-2 text-center">Login</h2>
                           <p class="text-center">Faça Login e se mantenha conectado.</p>
                           <form method="post" action="{{ route('login') }}">
                            @csrf
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email"  name= "email" class="form-control" id="email" aria-describedby="email" placeholder="fulano@exemplo.com">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password"  name ="password" class="form-control" id="password" aria-describedby="password" placeholder="xxxx">
                                    </div>
                                 </div>
                                 @error('password')
                                <span cstyle ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @error('email')
                                    <span style ="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="form-check mb-3">
                                       <input type="checkbox" class="form-check-input" id="customCheck1">
                                       <label class="form-check-label" for="customCheck1">Lembrar-me</label>
                                    </div>
                                    <a href="recoverpw.html">Esqueceu a Password?</a>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Login</button>
                              </div>
                              <!-- <p class="text-center my-3">or sign in with other accounts?</p>
                              <div class="d-flex justify-content-center">
                                 <ul class="list-group list-group-horizontal list-group-flush">
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="../../assets/images/brands/gm.svg" alt="gm" loading="lazy"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="../../assets/images/brands/fb.svg" alt="fb" loading="lazy"></a>
                                    </li>                                    
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="../../assets/images/brands/im.svg" alt="im" loading="lazy"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="../../assets/images/brands/li.svg" alt="li" loading="lazy"></a>
                                    </li>
                                 </ul>
                              </div>
                                -->
                              <p class="mt-3 text-center">
                                 Não tem uma conta? <a href="{{ route('register') }}" class="text-underline">Clique aqui para criar uma.</a>
                              </p>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 d-lg-block d-none  p-0  overflow-hidden" style ="height: 100vh;">
               <img src="{{asset('site_temp/img/banner-medico-com-medico-usando-oculos.jpg')}}" class="img-fluid gradient-main" alt="images" loading="lazy" >
            </div>
         </div>
      </section>
    </div>
{{--
    <!--Page Title-->
    <section class="page-title" style="background-image: url({{ asset('site_temp/img/banner-medico-com-medico-usando-oculos.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Login</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Login</li>
                </ul> 
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <div class="row">
                <div class="column col-lg-12 col-md-12 col-sm-12">
                    <!-- Login Form -->
                    <div class="login-form">
                        <h2>Login</h2>
                        <!--Login Form-->
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            @error('password')
                                <span cstyle ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('email')
                                <span style ="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                                <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">LOGIN</span></button>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="form-group pass">
                                <a href="{{ route('password.request') }}" class="psw">Esqueceu sua password?</a>
                            </div>
                            @endif
                        </form>
                    </div>
                    <!--End Login Form -->
                </div>
            </div>
        </div>
    </section>
    <!--End Login Section-->
    --}}
@endsection

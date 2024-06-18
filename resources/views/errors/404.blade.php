@extends('layouts.auth.index')
@section('title', '404 - Not Found')
@section('conteudo')
<!-- loader END -->
<div class="wrapper">
<div class="error-bg vh-100 bg-primary" style="background-image: url({{asset('assets/images/error/05.png')}}); background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center align-self-center vh-100">
            <div class="col-lg-7 md-lg-0"><img src="{{ asset('assets/images/error/06.png') }}" style="width: 100%"></div>
            <div class="col-lg-5 text-end">
                <h1 class="mb-0 mt-4 ">Oops! </h1>
                <h3 class="mt-2 mb-4 text-white">Parece que você se perdeu</h3>
                <a class=" d-inline-flex align-items-center btn btn-outline-light" href="{{ route('home') }}">Voltar para a pagina inicial</a>
            </div>
        </div>
    </div>   
</div>
</div>
@endsection
    
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="form-head mb-8 mb-md-8 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h3 class="text-black font-w600">Bienvenido</h3>
                <p class="mb-0 fs-18">Estado actual</p>
            </div>
        </div>
    </div>
    <hr>
        <info-component></info-component>
    <div class="row">
        <h3 class="text-black font-w600">Buscar persona</h3>
        <buscador-component></buscador-component>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2> Manual de usuario </h2>
    <embed src="{{ asset('pdf/manual.pdf') }}"/>
</div>
@endsection

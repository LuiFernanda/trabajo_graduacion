@extends('layouts.app')

@section('content')
    <body class="antialiased">
        <div id='app'>
            <example-component>form1</example-component>
        </div>

        <script src={{ asset("js/app.js") }}></script>
    </body>
@endsection
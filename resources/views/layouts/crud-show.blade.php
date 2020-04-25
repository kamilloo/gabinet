@extends('layouts.app')

@section('content')
    <div class="col-12 mb-4">
        <h1>@yield('header')</h1>
    </div>

    <div class="col-12">
            @yield('show-content')
    </div>


@endsection

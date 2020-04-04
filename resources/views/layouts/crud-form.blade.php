@extends('layouts.app')

@section('content')
    <div class="col-12 mb-4">
        <h1>@yield('header')</h1>
    </div>

    <div class="col-12">

        <form action="@yield('action')" method="POST">
            {{ csrf_field() }}
            @yield('method')
            @yield('form-control')

            <button type="submit" class="btn btn-primary">@yield('button')</button>
        </form>

    </div>


@endsection

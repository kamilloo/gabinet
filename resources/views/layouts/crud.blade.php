@extends('layouts.app')

@section('content')
    <div class="col-12 mb-4">
        <a class="btn btn-primary float-right" href="@yield('route.create')">Add&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <h1>@yield('header')</h1>
    </div>

    <div class="col-12">
        <table class="table table-hover">
            <thead>
                @yield('table-header')
            </thead>
            <tbody>
                @yield('table-item')
            </tbody>
            <tfoot>
                @yield('table-footer')
            </tfoot>
        </table>

    </div>


@endsection

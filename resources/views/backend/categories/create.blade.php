@extends('layouts.app')

@section('content')
    <div class="col-md-8 ">
        <div class="panel panel-default">
            <div class="panel-heading">Kategorie - Dodaj</div>

            @if (session('status'))
            <div class="panel-body">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            </div>
            @endif
            {!! Form::open(['url' => url('categories')]) !!}
            {!! Form::text('name') !!}
            {!! Form::submit() !!}
            {!! Form::close() !!}

        </div>
    </div>
@endsection

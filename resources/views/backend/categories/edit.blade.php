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
            {!! Form::open(['url' => route('categories.update', $category), 'method' => 'put']) !!}
            <div class="panel-body">
                {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nazwa']) !!}
            </div>
            <div class="panel-body">
                {!! Form::text('icon', $category->icon, ['class' => 'form-control', 'placeholder' => 'Ikona']) !!}
            </div>
            <div class="panel-body">
                {!! Form::submit('Zapis', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
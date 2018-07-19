@extends('layouts.app')

@section('content')
    <div class="col-md-8 ">
        <div class="panel panel-default">
            <div class="panel-heading">Portfolio <a href="{{ route('portfolio.create') }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></div>
            @if (session('status'))
            <div class="panel-body">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            </div>
            @endif
            <div class="panel-body">
                @foreach($files as $file)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ asset('storage/'.$file->path) }}">
                            <div class="caption">
                                <p>

                                    <form action="{{ route('portfolio.destroy', $file) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-warning" role="button">Delete</button>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

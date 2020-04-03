@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-default pull-right" href="{{ route('portfolio.create') }}">
                    Create <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <h1>Portfolio</h1>
            </div>
            <div class="panel-body">
                @if (session('status'))

                <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @foreach($files as $file)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ asset('storage/'.$file->path) }}">
                            <div class="caption">
                                    <form action="{{ route('portfolio.destroy', $file) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-warning" role="button">Delete</button>
                                    </form>
                            </div>
                            <p>
                                @foreach($file->tags as $tag)
                                    <span class="label label-primary">{{ $tag->name }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
@endsection

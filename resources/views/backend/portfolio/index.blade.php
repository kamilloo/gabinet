@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Portfolio</h1>
                <div class="float-right"><a class="btn btn-default " href="{{ route('portfolio.create') }}">
                    Create <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
            </div>
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

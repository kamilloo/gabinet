@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Certyfikaty</h1>
                <div class="float-right">
                    <a class="btn btn-default" href="{{ route('certificates.create') }}">Create&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
            </div>
            @if (session('status'))
            <div class="panel-body">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>Lp</th>
                    <th>Tytuł</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $certificate)
                    <tr>
                        <td>{{ $certificate->id }}</td>
                        <td>{{ $certificate->title }}&nbsp;
                            <a href="{{ route('certificates.edit', $certificate) }}">
                                <img width="150" class="img-thumbnail" src="{{ asset('storage/'.$certificate->path) }}">
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-default" href="{{ route('certificates.edit', $certificate) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        </td>
                        <td>
                            <form action="{{ route('certificates.destroy', $certificate) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-danger" type="submit">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>

                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection

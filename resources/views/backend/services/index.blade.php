@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-default pull-right" href="{{ route('services.create') }}">
                    Create <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <h1>Usługi</h1>
            </div>
            <div class="panel-body">
                @if (session('status'))
                <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                <thead>
                <tr>
                    <th>Lp</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->title }}</td>
                        <td><a href="{{ route('services.edit', $service) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a><a href="{{ route('services.destroy', $service) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">Usługi <a href="{{ route('services.create') }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></div>

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
@endsection

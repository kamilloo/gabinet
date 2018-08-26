@extends('layouts.app')

@section('content')
    <div class="col-md-8 ">
        <div class="panel panel-default">
            <div class="panel-heading">Kategorie <a href="{{ route('categories.create') }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></div>

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
                    <th>Ikona</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><span><i class="xsicon {{ $category->icon }}"></i>&nbsp;&nbsp;{{ $category->icon }}</span></td>
                        <td><a href="{{ route('categories.edit', $category) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a><a href="{{ route('categories.destroy', $category) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

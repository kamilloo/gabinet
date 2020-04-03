@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">

            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('pricing.create') }}">Create&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            </div>
            <h1>Cennik</h1>
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
                    <th>Tytuł</th>
                    <th>Zdjęcie</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pricing as $pricing_item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pricing_item->name }}</td>
                        <td>
                            <a  href="{{ route('pricing.edit', $pricing_item) }}">
                                <img width="150" class="img-thumbnail" src="{{ asset('storage/'.$pricing_item->path) }}">
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-default" href="{{ route('pricing.edit', $pricing_item) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <form class="form-inline pull-right" action="{{ route('pricing.destroy', $pricing_item) }}" method="post">
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
        </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="col-md-8 ">
        <div class="panel panel-default">
            <div class="panel-heading">Cennik <a href="{{ route('pricing.create') }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></div>

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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pricing as $pricing_item)
                    <tr>
                        <td>{{ $pricing_item->id }}</td>
                        <td>{{ $pricing_item->name }}<br>
                            <div class="thumbnail">
                                <a href="{{ route('pricing.edit', $pricing_item) }}"><img src="{{ asset('storage/'.$pricing_item->path) }}"></a>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('pricing.edit', $pricing_item) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <form action="{{ route('pricing.destroy', $pricing_item) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></td>

                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layouts.crud')

@section('content')
    @parent
@endsection

@section('header', 'Usługi')

@section('route.create', route('services.create'))

@section('table-header')

    <tr>
        <th scope="col">Lp</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Action</th>
    </tr>

@endsection


@section('table-footer')
    @if(!$services->count())
        <tr>
            <td colspan="3" scope="col">Brak Usług</td>
        </tr>
    @else
        <tr>
            <td colspan="3" scope="col">{{ $services->links() }}</td>
        </tr>

    @endif
@endsection


@section('table-item')
    @foreach($services as $service)
        <tr>
            <td class="align-middle" scope="row">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $service->title }}</td>
            <td class="align-middle">
                <a class="btn btn-info float-left" href="{{ route('services.edit', $service) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <form class="form-inline pl-2" action="{{ route('services.destroy', $service) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger" type="submit">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                </form>
            </td>
        </tr>
    @endforeach

@endsection

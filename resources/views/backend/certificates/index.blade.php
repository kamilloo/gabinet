@extends('layouts.app')

@section('content')
    <div class="col-md-8 ">
        <div class="panel panel-default">
            <div class="panel-heading">Certyfikaty <a href="{{ route('certificates.create') }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></div>

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
                @foreach($certificates as $certificate)
                    <tr>
                        <td>{{ $certificate->id }}</td>
                        <td>{{ $certificate->title }}<br>
                            <div class="thumbnail">
                                <a href="{{ route('certificates.edit', $certificate) }}"><img src="{{ asset('storage/'.$certificate->path) }}"></a>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('certificates.edit', $certificate) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <form action="{{ route('certificates.destroy', $certificate) }}" method="post">
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

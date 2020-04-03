@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">Witai {{ auth()->user()->name }}</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h4>Znajdujesz się w panelu do zarządziania stroną internetową</h4>
                <h2>Gabinet kosmetyki pielęgnacyjnej Katarzyna Piętka</h2>
                <p>Życzymy miłego dnia :)</p>

            </div>
        </div>
@endsection

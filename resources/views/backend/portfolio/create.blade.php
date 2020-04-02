@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="page-header">Dodaj zdjecie</h1>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => route('portfolio.store'), 'method' => \Illuminate\Http\Request::METHOD_POST]) !!}
            <div class="form-group">
                <label for="tags">Tagi</label><br>
                {!! Form::text('tags', null, ['class' => 'form-control', 'placeholder' => 'tagi']) !!}
                @if($errors->has('tags'))
                    <p><span class="text-danger">{{$errors->first('tags')}}</span></p>
                @endif
            </div>
            <div class="form-group">
                <label for="lfm">Dodaj obrazek</label>
                <div class="input-group">
                  <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                      <i class="fa fa-picture-o"></i> Importuj
                    </a>
                  </span>
                    <input id="thumbnail" class="form-control" type="text" name="filepath">
                </div>
                @if($errors->has('filepath'))
                    <p><span class="text-danger">{{$errors->first('filepath')}}</span></p>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <img id="holder" class="img-thumbnail">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj do galerii</button>

        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('javascript_content')
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix')) }}";

        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endsection

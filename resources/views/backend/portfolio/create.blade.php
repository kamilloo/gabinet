@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Dodaj zdjecie</h1>
        {!! Form::open(['url' => route('portfolio.store'), 'method' => \Illuminate\Http\Request::METHOD_POST]) !!}
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                  <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                      <i class="fa fa-picture-o"></i> Importuj
                    </a>
                  </span>
                    <input id="thumbnail" class="form-control" type="text" name="filepath">
                </div>
                <br>
                <div class="input-group section-padding">
                    <input type="submit" class="btn btn-primary" value="Dodaj do galerii">
                </div>
            </div>
            <div class="col-sm-4">
                <img id="holder" class="img-thumbnail">
            </div>
        </div>

        {!! Form::close() !!}
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
    </script>


    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>

@endsection

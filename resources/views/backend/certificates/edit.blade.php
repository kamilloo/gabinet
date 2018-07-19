@extends('layouts.app')

@section('content')
    <div class="col-md-8 ">
        <div class="panel panel-default">
            <div class="panel-heading">Certifikaty - Edycja</div>

            @if (session('status'))
                <div class="panel-body">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            {!! Form::open(['url' => route('certificates.update', $certificate), 'method' => 'put']) !!}
            <div class="panel-body">
                {!! Form::text('title', $certificate->title, ['class' => 'form-control', 'placeholder' => 'tytuł']) !!}
            </div>
            <div class="panel-body">
                {!! Form::text('description', $certificate->description, ['class' => 'form-control', 'placeholder' => 'opis']) !!}

            </div>
            <div class="panel-body">
                <div class="input-group col-md-4">
                  <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                      <i class="fa fa-picture-o"></i> Importuj
                    </a>
                  </span>
                    <input id="thumbnail" class="form-control" type="text" name="filepath">
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    <img id="holder" class="img-thumbnail" src="{{ asset('storage/'.$certificate->path) }}">
                </div>
            </div>

            <div class="panel-body">
                {!! Form::submit('Zapisz', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>
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

@extends('layouts.app')

@section('content')
    <div class="col-md-8 ">
        <div class="panel panel-default">
            <div class="panel-heading">Usługi - Edytuj</div>

            @if (session('status'))
            <div class="panel-body">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            </div>
            @endif
            {!! Form::open(['url' => route('services.update', $service), 'method' => 'put']) !!}
            <div class="panel-body">
                {!! Form::select('category_id', $categories->pluck('name','id'), $service->category_id, ['class' => 'form-control']) !!}
            </div>
            <div class="panel-body">
                {!! Form::text('title', $service->title, ['class' => 'form-control']) !!}
            </div>
            <div class="panel-body">
                {!! Form::textarea('description', $service->description) !!}
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
                    <img id="holder" class="img-thumbnail" src="{{ asset('storage/'.$service->path) }}">
                </div>
            </div>
            <div class="panel-body">
                {!! Form::submit('Zapisz', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    <script src="{{ asset('js/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection


@section('javascript_content')
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
    </script>

    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endsection

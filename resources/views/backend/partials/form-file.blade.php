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
        <img id="holder" class="img-thumbnail">
{{--        <img id="holder" class="img-thumbnail" src="{{ asset('storage/'.$service->path) }}">--}}

    </div>
</div>

<script>
    var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
</script>

<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>

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

{{--<div class="form-group">--}}
{{--    <label for="lfm">Dodaj obrazek</label>--}}
{{--    <div class="input-group">--}}
{{--                  <span class="input-group-btn">--}}
{{--                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">--}}
{{--                      <i class="fa fa-picture-o"></i> Importuj--}}
{{--                    </a>--}}
{{--                  </span>--}}
{{--        <input id="thumbnail" class="form-control" type="text" name="filepath">--}}
{{--    </div>--}}
{{--    @if($errors->has('filepath'))--}}
{{--        <p><span class="text-danger">{{$errors->first('filepath')}}</span></p>--}}
{{--    @endif--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--    <div class="col-sm-12">--}}
{{--        <img id="holder" class="img-thumbnail">--}}
{{--    </div>--}}
{{--</div>--}}

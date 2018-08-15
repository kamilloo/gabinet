@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => route('pricing.store')]) !!}

    <div class="col-md-8 ">
        <div class="panel panel-default">
            <div class="panel-heading">Cennik - Dodaj</div>

            @if (session('status'))
            <div class="panel-body">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            </div>
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
            @if($errors->has('title'))
                    <p>{{$errors->first('title')}}</p>
            @endif
            <div class="panel-body">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>
            <div class="panel-body">
                {!! Form::text('price_since', null, ['class' => 'form-control', 'placeholder' => 'Ceny od:']) !!}
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
                    <img id="holder" class="img-thumbnail">
                </div>
            </div>

            <div class="panel-body">
                {!! Form::submit('Dodaj', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>


    <div class="col-md-12 ">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>Nazwa</th>
                    <th>Cena</th>
                    <th>Opis</th>
                    <th>Link</th>
                    </thead>
                    <tbody id="price-items-list">
                    <tr data-price-item="0">
                        <td>{!! Form::text('items[0][title]', null, ['class' => 'form-control', 'placeholder' => 'Nazwa']) !!}</td>
                        <td>{!! Form::text('items[0][price]', null, ['class' => 'form-control', 'placeholder' => 'Cena']) !!}</td>
                        <td>{!! Form::text('items[0][description]', null, ['class' => 'form-control', 'placeholder' => 'Opis']) !!}</td>
                        <td>{!! Form::text('items[0][link]', null, ['class' => 'form-control', 'placeholder' => 'Link']) !!}</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4"><button type="button" class="btn btn-default js__next-price-item">Kolejna popozycja</button></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="panel-body">
                {!! Form::submit('Dodaj', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}

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

        var nextPriceItem = $('button.js__next-price-item').click(function(event){
            var template = $('#template-price-item');
            var priceItemsList = $('#price-items-list');
            var lastItem = priceItemsList.find('tr').last().data('price-item');
            var templateHtml = template.text();
            var nextItem = lastItem + 1;
            templateHtml = templateHtml.replace(/{%.*%}/gi,nextItem);
            priceItemsList.append(templateHtml);

        });
    </script>
    <script type="text/template" id="template-price-item">
        <tr data-price-item="{% item %}">
            <td>{!! Form::text('items[{% item %}][title]', null, ['class' => 'form-control', 'placeholder' => 'Nazwa']) !!}</td>
            <td>{!! Form::text('items[{% item %}][price]', null, ['class' => 'form-control', 'placeholder' => 'Cena']) !!}</td>
            <td>{!! Form::text('items[{% item %}][description]', null, ['class' => 'form-control', 'placeholder' => 'Opis']) !!}</td>
            <td>{!! Form::text('items[{% item %}][link]', null, ['class' => 'form-control', 'placeholder' => 'Link']) !!}</td>
        </tr>
    </script>
@endsection

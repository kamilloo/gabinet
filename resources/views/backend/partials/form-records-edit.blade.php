
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
                @foreach($pricing->items as $item)
                    <tr data-price-item="{{ $item->id }}">
                        <td>{!! Form::text("items[{$item->id}][title]", $item->title, ['class' => 'form-control', 'placeholder' => 'Nazwa']) !!}</td>
                        <td>{!! Form::text("items[{$item->id}][price]", $item->price, ['class' => 'form-control', 'placeholder' => 'Cena']) !!}</td>
                        <td>{!! Form::text("items[{$item->id}][description]", $item->description, ['class' => 'form-control', 'placeholder' => 'Opis']) !!}</td>
                        <td>{!! Form::text("items[{$item->id}][link]", $item->link, ['class' => 'form-control', 'placeholder' => 'Link']) !!}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"><button type="button" class="btn btn-default js__next-price-item">Kolejna popozycja</button></td>
                </tr>
                </tfoot>
            </table>
        </div>

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


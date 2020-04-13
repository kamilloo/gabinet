<div class="float-right form-group">
    <span class="border border-info rounded text-info shadow-sm p-2 bg-white"><i class="xsicon {{ $value }}"></i></span>
</div>
@include('backend.partials.form-select', [
'name' => 'icon',
'label' => 'Ikona',
'placeholder' => 'Wybierz obrazek',
'helper' => 'Wybierz obrazek odpowiadający kategorii',
'value' => $value,
'options' => $options

])

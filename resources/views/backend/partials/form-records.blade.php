<pricing-items
data-template='
    <table class="table table-borderless table-hover">
        <tbody>
            <tr>
            <td>
                @include('backend.partials.form-input', [
'name' => 'items[{% item %}][title]',
'label' => '',
'placeholder' => 'Nazwa',
'helper' => '',
'value' => '{% title %}'
])
        </td>
        <td>
@include('backend.partials.form-number', [
'name' => 'items[{% item %}][price]',
'label' => '',
'placeholder' => 'Cena',
'helper' => '',
'value' => '{% price %}'
])
        </td>
        <td>
@include('backend.partials.form-input', [
'name' => 'items[{% item %}][description]',
'label' => '',
'placeholder' => 'Opis',
'helper' => '',
'value' => '{% description %}'
])
        </td>
        <td>
@include('backend.partials.form-input', [
'name' => 'items[{% item %}][link]',
'label' => '',
'placeholder' => 'Link',
'helper' => '',
'value' => '{% link %}'
])
        </td>
    </tr>
    </tbody>
</table>
'
:entry-items="{{ json_encode($items) }}"
>

</pricing-items>

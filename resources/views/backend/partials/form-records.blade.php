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
'value' => old('items[{% item %}][title]')
])
        </td>
        <td>
@include('backend.partials.form-input', [
'name' => 'items[{% item %}][price]',
'label' => '',
'placeholder' => 'Cena',
'helper' => '',
'value' => old('items[{% item %}][price]')
])
        </td>
        <td>
@include('backend.partials.form-input', [
'name' => 'items[{% item %}][description]',
'label' => '',
'placeholder' => 'Opis',
'helper' => '',
'value' => old('items[{% item %}][description]')
])
        </td>
        <td>
@include('backend.partials.form-input', [
'name' => 'items[{% item %}][link]',
'label' => '',
'placeholder' => 'Link',
'helper' => '',
'value' => old('items[{% item %}][link]')
])
        </td>
    </tr>
    </tbody>
</table>


'
>
    <table class="table table-borderless table-hover">
        <tbody>
            <tr>
            <td>
                @include('backend.partials.form-input', [
'name' => 'items[0][title]',
'label' => '',
'placeholder' => 'Nazwa',
'helper' => '',
'value' => old('items[0][title]')
])
            </td>
            <td>
                @include('backend.partials.form-input', [
'name' => 'items[0][price]',
'label' => '',
'placeholder' => 'Cena',
'helper' => '',
'value' => old('items[0][price]')
])
            </td>
            <td>
                @include('backend.partials.form-input', [
'name' => 'items[0][description]',
'label' => '',
'placeholder' => 'Opis',
'helper' => '',
'value' => old('items[0][description]')
])
            </td>
            <td>
                @include('backend.partials.form-input', [
'name' => 'items[0][link]',
'label' => '',
'placeholder' => 'Link',
'helper' => '',
'value' => old('items[0][link]')
])
            </td>
        </tr>
        </tbody>
    </table>

</pricing-items>

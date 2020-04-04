<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="form-control" id="{{ $name }}" name="{{ $name }}">
        <option @if(empty($value)) selected @endif value="">{{ $placeholder }}</option>
    @foreach($options as $option => $option_label)
            <option @if($option == $value) selected @endif value="{{ $option }}">{{ $option_label }}</option>
        @endforeach
    </select>
    <small id="{{ $name }}Help" class="form-text text-muted">{{ $helper }}</small>
    @if($errors->has($name))
        <small id="{{ $name }}Error" class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>

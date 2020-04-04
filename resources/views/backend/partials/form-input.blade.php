<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="text" class="form-control" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    <small id="{{ $name }}Help" class="form-text text-muted">{{ $helper }}</small>

    @if($errors->has($name))
        <small id="{{ $name }}Error" class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="number" class="form-control" id="{{ $name }}" step="0.01" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    <small id="{{ $name }}Help" class="form-text text-muted">{{ $helper }}</small>

    @if($errors->has($name))
        <small id="{{ $name }}Error" class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>

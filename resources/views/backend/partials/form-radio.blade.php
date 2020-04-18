<div class="form-group">
    <label class="pr-4" for="{{ $name }}">{{ $label }}</label>

    @foreach($options as $option => $option_label)

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" @if($option == $value) checked @endif value="{{ $option }}"   name="{{ $name }}" id="radio-{{ $name  }}-{{ $option_label }}" value="{{ $option }}">
            <label class="form-check-label" for="radio-{{ $name  }}-{{ $option_label }}">{{ $option_label }}</label>
        </div>
    @endforeach

    <small id="{{ $name }}Help" class="form-text text-muted">{{ $helper }}</small>
    @if($errors->has($name))
        <small id="{{ $name }}Error" class="form-text text-danger">{{ $errors->first($name) }}</small>
    @endif
</div>

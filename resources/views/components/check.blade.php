<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" @checked(old($name, $default)) {{ $attributes ?? '' }}>
    {{ $label }}
  </label>
</div>

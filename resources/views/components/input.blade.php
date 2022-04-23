<div class="form-group">
  <label for="{{ $name }}">{{ $label ?? '' }}</label>

  <input
    type="{{ $type ?? 'text' }}"
    class="form-control"
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ $placeholder ?? '' }}"
    value="{{ old($name, $value ?? null) }}"
    {{ collect($attributes ?? [])->implode(' ', ' ') }}
  >

  @error($name)
    <small class="form-text text-danger">{{ $message }}</small>
  @enderror
</div>

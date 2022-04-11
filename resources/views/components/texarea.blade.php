<div class="form-group">
    <label for="{{ $name }}">{{ $label ?? '' }}</label>

    <textarea
      type="{{ $type ?? 'text' }}"
      class="form-control"
      name="{{ $name }}"
      id="{{ $name }}"
      placeholder="{{ $placeholder ?? '' }}"
      value="{{ old($name, $value) }}"
      rows="{{ $rows ?? '3' }}"

      {{ $attributes ?? '' }}
    ></textarea>

    @error($name)
      <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

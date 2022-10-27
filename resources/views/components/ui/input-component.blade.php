<div>
    @if ($attributes->has('label'))
        <label for="{{ $attributes->get('id') }}">{{ $attributes->get('label') }}</label>
    @endif
    <input type="{{ $type }}"
        {{ $attributes->class([
            'form-control',
            'is-invalid' => $attributes->has('name') && $errors->has($attributes->get('name')),
        ]) }} />

    @error($attributes->get('name'))
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

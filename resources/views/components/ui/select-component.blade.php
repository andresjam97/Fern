<div>
    <label for="{{$attributes->get('id')}}">{{ $label }}</label>
    <select
        class="form-select"
        {{ $attributes }}>

        {{ $slot }}

    </select>
</div>

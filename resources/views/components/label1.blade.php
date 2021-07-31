@props(['value'])

<label {{ $attributes->merge(['class' => 'block  loglabel ml-4 ']) }}>
    {{ $value ?? $slot }}
</label>

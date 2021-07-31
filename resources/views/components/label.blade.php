@props(['value'])

<label {{ $attributes->merge(['class' => 'block authtitle ml-4 ']) }}>
    {{ $value ?? $slot }}
</label>

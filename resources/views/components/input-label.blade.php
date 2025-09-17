@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[var(--dark-purple)]']) }}>
    {{ $value ?? $slot }}
</label>

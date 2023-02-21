@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-500 mb-1 ml-1']) }}>
    {{ $value ?? $slot }}
</label>

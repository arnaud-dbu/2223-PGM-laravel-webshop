@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md mb-1 text-gray-700/[0.70]']) }}>
    {{ $value ?? $slot }}
</label>

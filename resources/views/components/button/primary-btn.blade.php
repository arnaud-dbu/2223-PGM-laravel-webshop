<button type="submit" {{ $attributes->merge(['class' => 'uppercase text-center font-medium font-secondary shadow bg-gray-900 text-gray-50 px-7 py-3 my-7 hover:opacity-90']) }}>
    {{ $slot }}
</button>

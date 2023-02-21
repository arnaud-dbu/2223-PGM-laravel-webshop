<button type="submit" {{ $attributes->merge(['class' => 'uppercase w-fit font-medium font-secondary bg-gray-50 text-gray-900 px-3 py-2 shadow hover:opacity-90']) }}>
    {{$slot}}
</button>
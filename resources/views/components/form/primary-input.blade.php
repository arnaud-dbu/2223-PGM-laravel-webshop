@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-transparent w-full border-2 border-[#B9B8B8] px-5 py-3']) !!}>

@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-transparent border-2 outline-none border-[#B9B8B8] px-5 py-3']) !!}>

@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-black border-gold-300 focus:border-gold-300 focus:ring focus:ring-gold-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>

@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(
['class' => 'border border-gray-300 rounded-sm px-2 py-2 outline-none transition-colors duration-150 ease-in-out focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm']
) !!}>

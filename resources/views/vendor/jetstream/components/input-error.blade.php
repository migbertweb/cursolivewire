@props(['for'])
@error($for)
<p {{ $attributes->merge(['class' => 'bg-red-100 mt-2 py-2 px-4 text-xs text-red-600 rounded-sm']) }}>{{ $message }}</p>
@enderror

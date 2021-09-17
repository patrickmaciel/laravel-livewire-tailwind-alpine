@props(['mCols' => 1, 'dCols' => 2])
<div {{ $attributes }} class="mt-6 grid grid-cols-{{ $mCols }} gap-y-6 gap-x-4 sm:grid-cols-{{ $dCols }}">
    {{ $slot }}
</div>

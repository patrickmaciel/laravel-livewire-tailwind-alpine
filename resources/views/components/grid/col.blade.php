@props(['size' => 1])
<div {{ $attributes->merge(['class' => 'col-span-' . $size]) }}>
    {{ $slot }}
</div>

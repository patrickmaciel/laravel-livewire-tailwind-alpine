@props(['name', 'label', 'value', 'placeholder'])
<div class="relative flex items-start">
    <div class="flex items-center h-5">
        <input {{ $attributes }} id="ck-{{ Str::slug($value) }}" name="{{ $name }}[]" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" value="{{ $value }}">
    </div>
    <div class="ml-3 text-sm">
        <label for="ck-{{ Str::slug($value) }}" class="font-medium text-gray-700">{{ $label }}</label>
        @if (!empty($placeholder)) <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p> @endif
    </div>
</div>

@props(['value', 'label', 'name'])
<div class="flex items-center">
    <input id="rd-{{ Str::slug($value) }}" name="{{ $name }}[]" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="{{ $value }}">

    <label for="rd-{{ Str::slug($value) }}" class="ml-3 block text-sm font-medium text-gray-700">
        {{ $label }}
    </label>
</div>

@props(['name'])
<textarea name="{{ $name }}" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" {{ $attributes->except(['class']) }}></textarea>

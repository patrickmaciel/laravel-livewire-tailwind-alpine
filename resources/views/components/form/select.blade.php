@props(['name', 'default' => false])
<select name="{{ $name }}" autocomplete="{{ $name }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    @if ($default)
        <option value="">Selecione</option>
    @endif

    {{ $slot }}
</select>

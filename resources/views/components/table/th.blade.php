@props(['asc' => true, 'text' => 'left'])
<th {{ $attributes }} class="cursor-pointer px-6 py-3 border-b border-gray-200 bg-gray-50 text-{{ $text }} text-xs font-medium text-gray-500 uppercase tracking-wider">
    <div class="flex gap-2 items-center {{ $text === 'right' ? 'justify-end' : '' }}">
        <span class="lg:pl-2">{{ $slot }}</span>
        @if ($asc)
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
          </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        @endif
    </div>
</th>

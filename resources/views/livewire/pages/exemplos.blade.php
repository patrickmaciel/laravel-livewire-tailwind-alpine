<div class="relative min-h-screen bg-white overflow-hidden flex">
    <div class="max-w-screen-xl relative m-auto space-y-6">
    {{-- <div class="min-w-full max-w-screen-xl relative m-auto"> --}}
        <x-title.h1-extra>Exemplos</x-title.h1-extra>

        <div class="rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px">
            <x-grid.action-link titulo='CRUD' :rota="route('todo')">
                <x-slot name='icon'>☕</x-slot>
                Form inline + Tabela paginada.
            </x-grid.action-link>

            <x-grid.action-link titulo='CRUD + Modal' :rota="route('todo-modal')">
                <x-slot name='icon'>🛠</x-slot>
                Form na Modal + Tabela paginada.
            </x-grid.action-link>

          </div>


    </div>
</div>

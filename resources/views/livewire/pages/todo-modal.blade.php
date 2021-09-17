<div x-data="{ modalIsOpen: false }" class="flex flex-col w-0 flex-1 overflow-hidden">
    <div
        x-show="modalIsOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        x-cloak
        class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full sm:p-6">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
            <button x-on:click='modalIsOpen = !modalIsOpen' type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            </div>
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                      </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    {{-- <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Novo Todo
                    </h3> --}}

                    <!-- form todo -->
                    <form wire:submit.prevent="store"
                        x-on:todo-added.window="modalIsOpen = false"
                        class="space-y-8 divide-y divide-gray-200">
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div>
                                <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Profile
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    This information will be displayed publicly so be careful what you share.
                                </p>
                                </div>

                                {{-- <x-grid.grid wire:loading.delay wire:target='store'>
                                    <x-grid.col size='2'>
                                        <x-form.helper-text>Processando, aguarde...</x-form.helper-text>
                                    </x-grid.col>
                                </x-grid.grid> --}}

                                <x-grid.grid>
                                    <x-grid.col size='2'>
                                        <x-form.label name='title' label='Titulo' :error= />
                                        <x-form.input.text wire:model.lazy='title' name='title' placeholder='Digite a tarefa aqui' />
                                        @error('title') <x-form.error-text>{{ $message }}</x-form.error-text> @enderror
                                    </x-grid.col>

                                    <x-grid.col size='2'>
                                        <x-form.label name='description' label='Descrição' />
                                        <div class="mt-1">
                                            <x-form.textarea wire:model.lazy='description' name='description' placeholder='Digite a descrição aqui' />
                                        </div>
                                        @error('description') <x-form.error-text>{{ $message }}</x-form.error-text> @enderror
                                        <x-form.helper-text>Procure ser breve no contexto da tarefa. Não ultrapasse 300 caracteres.</x-form.helper-text>
                                    </x-grid.col>

                                    <x-grid.col>
                                        <x-form.label name='status' label='Status' />
                                        <div class="mt-1">
                                            <x-form.select name='status'>
                                                <option value="0">Pendente</option>
                                                <option value="1">Concluído</option>
                                            </x-form.select>
                                        </div>
                                    </x-grid.col>

                                    <x-grid.col>
                                        <x-form.label name='photo' label='Foto' />
                                        <div class="mt-1 flex items-center">
                                            <x-form.file-image />
                                        </div>
                                    </x-grid.col>

                                    <x-grid.col>
                                        <fieldset>
                                            <x-form.fieldset.legend label='Categorias' />

                                            <div class="mt-4 space-y-4">
                                                <x-form.input.checkbox name='categorias' label='Casa' value='casa' />
                                                <x-form.input.checkbox name='categorias' label='Lazer' value='lazer' />
                                                <x-form.input.checkbox name='categorias' label='Cartão de Crédito' value='cartao-de-credito' />
                                                <x-form.input.checkbox name='categorias' label='Dinheiro' value='dinheiro' />
                                            </div>
                                        </fieldset>
                                    </x-grid.col>

                                    <x-grid.col>
                                        <fieldset>
                                            <div>
                                                <x-form.fieldset.legend label='Status' />
                                                {{-- <x-form.fieldset.helper-text text='These are delivered via SMS to your mobile phone' /> --}}
                                            </div>
                                            <div class="mt-4 space-y-4">
                                                <x-form.input.radio name='status' label='Pendente' value='0' />
                                                <x-form.input.radio name='status' label='Concluído' value='1' />
                                            </div>
                                        </fieldset>
                                    </x-grid.col>

                                    <x-grid.col size='2'>
                                        <div class="pt-5">
                                            <div class="flex justify-end">
                                                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Cancel
                                                </button>
                                                <button wire:loading.attr='disabled' wire:loading.class='opacity-50' wire:target='store' type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <svg wire:loading.flex wire:target='store' class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </x-grid.col>
                                </x-grid.grid>
                            </div><!-- empty div -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Search header -->
    <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
    <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/menu-alt-1 -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
    </button>
    <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
        <div class="flex-1 flex">
        <form class="w-full flex md:ml-0" action="#" method="GET">
            <label for="search-field" class="sr-only">Search</label>
            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/search -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
            <input id="search-field" name="search-field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search">
            </div>
        </form>
        </div>
        <div class="flex items-center">
        <!-- Profile dropdown -->
        <div class="ml-3 relative">
            <div>
            <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
            </div>

            <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-0">View profile</a>
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-2">Notifications</a>
            </div>
            <div class="py-1" role="none">
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-3">Get desktop app</a>
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-4">Support</a>
            </div>
            <div class="py-1" role="none">
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-5">Logout</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
    <!-- Page title & actions -->
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            To do
        </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Excluídos
        </button>
        <button x-on:click='modalIsOpen = !modalIsOpen' type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3 cursor-pointer">
            Novo
        </button>
        </div>
    </div>

    <!-- Projects table (small breakpoint and up) -->
    <div class="hidden mt-8 sm:block">
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <div class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" colspan="3">
                <x-form.input.text
                    wire:model.debounce.500ms='buscaTabela'
                    name='busca-tabela'
                    placeholder='Busca por título da tarefa' />
            </div>

        <table class="min-w-full">
            <thead>
                <tr class="border-t border-gray-200">
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <span class="lg:pl-2">Todos as tarefas</span>
                    </th>

                    <th class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Last updated
                    </th>
                    <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-100">
            @foreach($todos as $todo)
                <tr>
                    <td class="px-6 py-3 max-w-0 w-full whitespace-nowrap text-sm font-medium text-gray-900">
                    <div class="flex items-center space-x-3 lg:pl-2">
                        <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600" aria-hidden="true"></div>
                        <a href="#" class="truncate hover:text-gray-600">
                        <span>
                            {{ $todo->title }}
                            <span class="text-gray-500 font-normal">{{ $todo->description }}</span>
                        </span>
                        </a>
                    </div>
                    </td>

                    <td class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">
                        {{ $todo->updated_at->format('d/m/Y') }}
                    </td>
                    <td class="pr-6">
                    <div x-data="{ isOpen: false }" class="relative flex justify-end items-center">
                        <button x-on:click='isOpen = !isOpen' type="button" class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="project-options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open options</span>
                        <!-- Heroicon name: solid/dots-vertical -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                        </button>

                        <div x-cloak
                            x-show="isOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            class="mx-3 origin-top-right absolute right-7 top-0 w-48 mt-1 rounded-md shadow-lg z-10 bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="project-options-menu-0-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="project-options-menu-0-item-0">
                            <!-- Heroicon name: solid/pencil-alt -->
                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            Edit
                            </a>
                            <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="project-options-menu-0-item-1">
                            <!-- Heroicon name: solid/duplicate -->
                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z" />
                                <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z" />
                            </svg>
                            Duplicate
                            </a>
                            <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="project-options-menu-0-item-2">
                            <!-- Heroicon name: solid/user-add -->
                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                            </svg>
                            Share
                            </a>
                        </div>
                        <div class="py-1" role="none">
                            <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="project-options-menu-0-item-3">
                            <!-- Heroicon name: solid/trash -->
                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Delete
                            </a>
                        </div>
                        </div>
                    </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="5">
                        <div class="py-3 px-6">
                            {{ $todos->links() }}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
    </main>
</div>

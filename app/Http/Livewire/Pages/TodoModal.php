<?php

namespace App\Http\Livewire\Pages;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoModal extends Component
{
    use WithPagination;

    public $title = '';
    public $description = '';
    public $buscaTabela = null;

    public $rules = [
        'title' => 'required|min:3',
        'description' => 'nullable|min:3',
    ];

    public function updated($field)
    {
        if (in_array($field, ['title', 'description'])) {
            $this->validateOnly($field, $this->rules);
        }
    }

    public function store()
    {
        $this->validate();
        // sleep(2);
        ModelsTodo::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->resetPage();
        $this->reset('title', 'description');

        $this->dispatchBrowserEvent('todo-added');
    }

    public function updatedBuscaTabela()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.pages.todo-modal', [
            'todos' => ModelsTodo::orderBy('id', 'desc')
                ->where(function ($query) {
                    if (!empty($this->buscaTabela)) {
                        $query->where('title', 'like', "%{$this->buscaTabela}%");
                    }
                })
                ->paginate(5)
        ])->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Pages;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoAlpineInline extends Component
{
    use WithPagination;

    public $title = '';
    public $description = '';
    public $buscaTabela = null;

    public $sortField = 'id';
    public $sortAsc = false;

    protected $queryString = ['sortField', 'sortAsc'];

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

        // x-init=" setTimeout(() => { open = false }, 2500); setTimeout(() => { $refs.this.remove() }, 3000); " x-ref="this"
        // session()->flash('notify-saved', 'Todo criado com sucesso!');

        $this->emitSelf('notify-saved');
    }

    public function sortBy($field)
    {
        $this->sortField = $field;
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
    }

    public function isSortable($field)
    {
        return $this->sortField === $field ? $this->sortAsc : true;
    }

    public function render()
    {
        return view('livewire.pages.todo-alpine-inline', [
            'todos' => ModelsTodo::where(function ($query) {
                if (!empty($this->buscaTabela)) {
                    $query->where('title', 'like', "%{$this->buscaTabela}%");
                }
            })->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(5)
        ])->layout('layouts.admin');
    }
}

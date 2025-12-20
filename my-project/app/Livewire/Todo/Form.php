<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use App\Models\TodoItem;

class Form extends Component
{
    public $description; // Connected to the form (wire:model.defer="description")

    protected $rules = [
        // No empty, min 6 char
        'description' => 'required|min:6' // Validation rules when we call $this->validate()
    ];

    public function saved() 
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.todo.form');
    }

    public function createItem() 
    {
        $this->validate();

        TodoItem::create([
            'description' => $this->description,
            'user_id' => auth()->id(),
        ]);

        $this->dispatch('saved');

        $this->description=''; // Input clear
    }
}

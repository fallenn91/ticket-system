<?php

namespace App\Livewire\Todo;

use App\Models\TodoItem;
use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class Form extends Component
{
    use AuthorizesRequests;
    public $users;
    public $user_id;
    public $description; // Connected to the form (wire:model.defer="description")

    protected $rules = [
        // No empty, min 6 char
        'description' => 'required|min:6' // Validation rules when we call $this->validate()
    ];
    public function mount()
    {
        $this->users = User::where('role', 'user')->get();
    }

    public function saved() 
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.todo.form');
    }

    public function create() 
    {
        

        $this->validate([
            'description' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        TodoItem::create([
            'description' => $this->description,
            'user_id' => $this->user_id,
            'done' => false,
        ]);

        $this->dispatch('saved');

        $this->description=''; // Input clear
        $this->user_id = null;
    }
    
}

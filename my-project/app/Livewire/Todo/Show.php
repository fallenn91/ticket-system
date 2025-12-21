<?php

namespace App\Livewire\Todo;

use App\Models\TodoItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['saved']; // Event called saved ($this->emit('saved'))
    use AuthorizesRequests;

    public function render()
    {
        //$list = TodoItem::all()->sortByDesc('created_at'); // get tasks from bbdd, orderby
        // Filter
        if (auth()->user()->isAdmin()) {
            $todos = TodoItem::orderByDesc('created_at')->get();
        } else {

            $todos = TodoItem::where('user_id', auth()->id())
                ->orderByDesc('created_at')
                ->get();
        }
            
        return view('livewire.todo.show', compact('todos')); // to the blade view
    }

    // METHODS

    public function toggleDone(TodoItem $todo)
    {
        $this->authorize('update', $todo);

        $todo->update([
            'done' => ! $todo->done
        ]);
    }

    public function delete(TodoItem $todo)
    {
        $this->authorize('delete', $todo);

        $todo->delete();
    }

}

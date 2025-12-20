<?php

namespace App\Livewire\Todo;

use App\Models\TodoItem;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['saved']; // Event called saved ($this->emit('saved'))

    public function render()
    {
        //$list = TodoItem::all()->sortByDesc('created_at'); // get tasks from bbdd, orderby
        // Filter
        $list = TodoItem::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();
            
        return view('livewire.todo.show', [ 'list' => $list ]); // to the blade view as $list
    }

    // METHODS

    public function markAsDone(TodoItem $item) 
    {
        $item->done = true;
        $item->save();
    }

    public function markAsToDo(TodoItem $item)
    {
        $item->done = false;
        $item->save();
    }
    public function deleteItem(TodoItem $item) 
    {
        $item->delete();
    }
}

<?php

namespace App\Policies;

use App\Models\TodoItem;
use App\Models\User;

class TodoItemPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, TodoItem $todo)
    {
        return $user->isAdmin() || $todo->user_id === $user->id;
    }
    public function delete(User $user)
    {
        return $user->isAdmin();
    }
    public function create(User $user)
    {
        return $user->isAdmin();
    }
    public function view(User $user, TodoItem $todo)
    {
        return $user->isAdmin() || $todo->user_id === $user->id;
    }
}

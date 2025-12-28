<div>
    {{-- Success is as dangerous as failure. --}}
    
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Item</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Assigned to</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr @if($loop->even)class="bg-gray-100"@endif>
                    <td class="border px-4 py-2">{{ $todo->description  }}</td>
                    <td class="border px-4 py-2">{{ $todo->category  }}</td>
                    <td class="border px-4 py-2">{{ ($todo->user)->name ?? 'Sin asignar' }}</td>
                    <td
                        @class([
                            'border px-4 py-2 text-center bg-yellow-400 rounded font-semibold ',
                            'bg-green-500 text-white' => $todo->done,
                            'bg-yellow-300 text-gray-800' => !$todo->done,
                        ])
                    >
                        {{ $todo->done ? 'Done' : 'To Do' }}
                    </td>
                    
                    <td class="border px-4 py-2">
                        
                            @can('update', $todo)
                                <button
                                    wire:click="toggleDone({{ $todo->id }})"
                                    @class([
                                        'px-3 py-1 text-white bg-blue-500 rounded',
                                    
                                        
                                    ])
                                >
                                    {{ $todo->done ? 'Undone' : 'Done' }}
                                </button>
                            @endcan
                        
                            @can('delete', $todo)
                                <button
                                    wire:click="delete({{ $todo->id }})"
                                    class="px-3 py-1 bg-red-600 text-white rounded"
                                >
                                    Delete
                                </button>
                            @endcan
                        
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<x-form-section submit="create">
    <x-slot name="title">
        {{ __('Create New To-Do Item') }}
    </x-slot>
    
    <x-slot name="description">
        {{ __('Create a new item in your to-do list.') }}
    </x-slot>
    
    
    <x-slot name="form">
        @can('create', App\Models\TodoItem::class)
            
        
        <div class="col-span-6 sm:col-span-4">
            <x-input-label for="category" value="{{ __('Item Category') }}" />
                <select wire:model = "category_id" class="mt-1 block w-full">
                    <option value="">-- Select --</option>
                    @foreach ($item_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            <x-input-label for="description" value="{{ __('Item Description') }}" />

            <x-text-input
                id="description"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="description"
                autocomplete="description"
            />
            <select wire:model="user_id" class="mt-1 block w-full">
                <option value = "">-- Assign User --</option>
                @foreach ($users as $user )
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        @endcan
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        @can('create', App\Models\TodoItem::class)
            <button wire:click="create"
            class="px-4 py-2 bg-blue-600 text-white rounded"
            >
            Create
            </button>
        @endcan
    </x-slot>
</x-form-section>

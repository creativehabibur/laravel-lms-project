<div>
    <form class="p-4" wire:submit.prevent="createRole">
        <div class="flex w-full">
            <div class="w-full">
                <label for="name" class="lms-label">Name</label>
                <input type="text" wire:model="name" id="name"  class="lms-input" placeholder="Type name" />

                @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label for="role" class="text-gray-600">Permissions</label>
             <div class="flex gap-4 items-center">
                @foreach($permissions as $permission)
                    <input type="checkbox" wire:model="selectPermissions" value="{{$permission->name}}">{{$permission->name}}</input>
                @endforeach
             </div>
            @error('selectPermissions')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        @include('components.form-submit-btn',[
            'target' =>'updateLead',
            'class' => 'bg-blue-500',
            'buttonText'=>'Update'
        ])
    </form>

</div>

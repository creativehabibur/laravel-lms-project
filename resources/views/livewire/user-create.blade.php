<div>
    <form class="p-4" wire:submit.prevent="userCreate">
        <div class="flex w-full">
            <div class="w-full">
                <label for="name" class="lms-label">Name</label>
                <input type="text" wire:model="name" id="name"  class="lms-input" placeholder="Type name" />

                @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full mx-3">
                <label for="email" class="lms-label">Email address</label>
                <input type="email" wire:model="email" id="email"  class="lms-input" placeholder="Type email" />
                @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full">
                <label for="password" class="lms-label">password</label>
                <input type="password" wire:model="password" id="password"  class="lms-input"/>
                @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label for="role" class="text-gray-600">Role</label>
            <select wire:model.lazy="selectedRole" id="role" class="lms-input">
                <option value="">Select role</option>
                @foreach($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>

            @error('selectedRole')
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

<div>
    <form class="p-4" wire:submit.prevent="updateLead({{$lead_id}})">
        <div class="flex w-full">
            <div class="w-full">
                <label for="floating_email" class="lms-label">Name</label>
                <input type="text" wire:model="name" id="floating_email"  class="lms-input" placeholder="Type name" />

                @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full mx-3">
                <label for="floating_email" class="lms-label">Email address</label>
                <input type="email" wire:model="email" id="floating_email"  class="lms-input" placeholder="Type email" />
                @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full">
                <label for="floating_email" class="lms-label">Phone</label>
                <input type="text" wire:model="phone" id="floating_email"  class="lms-input"/>
                @error('phone')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>

     @include('components.form-submit-btn',[
         'target' =>'updateLead',
         'class' => 'bg-blue-500',
         'buttonText'=>'Update'
     ])
    </form>

    <div class="p-4">
        <h4 class="text-lg text-gray-600 py-4">Note List</h4>
        @if (!$notes->isEmpty())
            @foreach($notes as $note)
                <p class="text-sm font-medium py-2 border-b border-gray-300">{{$note->description}}</p>
            @endforeach
        @else
        <p class="text-gray-700 text-sm font-bold">No Notes Foud!</p>
        @endif
    </div>
    <form wire:submit.prevent="addNote" class="p-4">
        <label for="message" class="block mb-2 font-medium text-gray-900">Add New Notes</label>
        <textarea id="message" rows="4" wire:model="note" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
        @include('components.form-submit-btn',[
          'target' =>'addNote',
          'class' => 'bg-green-500',
          'buttonText' => 'Save',
     ])
    </form>


</div>

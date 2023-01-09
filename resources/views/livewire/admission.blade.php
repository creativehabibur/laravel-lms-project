<div>
    <form wire:submit.prevent="search">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="search" id="default-search" wire:model="search"  class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search name, phone,email..." required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>

    <form wire:submit.prevent="admissionSubmit" >
        @if(isset($leads) && count($leads) > 0)
            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a lead</label>
                <select id="countries" wire:model="lead_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Choose a lead</option>
                    @foreach($leads as $lead)
                        <option value="{{$lead->id}}">{{$lead->name}}</option>
                    @endforeach
                </select>
            </div>
            @if (!empty($lead_id))
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a course</label>
                    <select wire:change="selectLead" wire:model="course_id" id="courses" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Choose a course</option>
                        @foreach($courses as $course)
                            <option  value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>

                @if (!empty($selectedCourse))
                    <div>
                        <div class="text-lg text-gray-400 mt-4">Price: {{number_format($selectedCourse->price,2)}}</div>
                        <div class="mt-4">
                            <label for="default-payment" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Payment</label>
                            <input type="number" id="default-payment" step="0.01" max="{{number_format($selectedCourse->price,2)}}" wire:model="payment" class="focus:outline-none border border-gray-300 rounded px-4" placeholder="Payment">
                        </div>
                    </div>
                    @include('components.form-submit-btn',[
                     'target' =>'admissionSubmit',
                    'class' => 'bg-blue-500',
                    'buttonText'=>'Submit'
                   ])
                @endif
            @endif
        @endif
    </form>

</div>

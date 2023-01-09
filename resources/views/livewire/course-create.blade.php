<div>
    <form wire:submit.prevent="createCourse">
        {{var_dump($selectedDays)}}
        <div class=" w-full">
            <div class="mb-6">
                @include('components.form-field',[
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
                'placeholder' => 'Enter name',
                'required' => 'required',

            ])
            </div>
            <div class="mb-6">
                @include('components.form-field',[
                'name' => 'description',
                'label' => 'Description',
                'type' => 'textarea',
                'placeholder' => 'Enter description',
                'required' => 'required',

            ])
            </div>
            <div class="mb-6">
                @include('components.form-field',[
                'name' => 'price',
                'label' => 'Price',
                'type' => 'number',
                'placeholder' => 'Enter price',
                'required' => 'required',

                ])
            </div>

            <div class="flex mb-6 items-center">
                <div class="w-full mr-4">
                    <label for="days">Days</label>
                    <div class="flex flex-wrap -mx-4">
                        @foreach($days as $day)
                            <div class="min-w-max flex px-4 items-center">
                                <input wire:model.lazy="selectedDays" class="mr-2" type="checkbox" value="{{$day}}" id="{{$day}}"> <label for="{{$day}}">{{ucfirst($day)}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="min-w-max">
                    <div class="mb-6">
                        @include('components.form-field',[
                            'name' => 'time',
                            'label' => 'Time',
                            'type' => 'time',
                            'placeholder' => 'Enter time',
                            'required' => 'required',

                        ])
                    </div>
                </div>
                <div class="min-w-max mr-4">
                    <div class="mb-6">
                        @include('components.form-field',[
                            'name' => 'end_date',
                            'label' => 'Date',
                            'type' => 'date',
                            'placeholder' => 'Enter end date',
                            'required' => 'required',

                        ])
                    </div>
                </div>
            </div>


        </div>
        @include('components.form-submit-btn',[
            'target' =>'updateLead',
            'class' => 'bg-blue-500',
            'buttonText'=>'Update'
        ])
    </form>
</div>

<label for="{{$name}}" class="">{{$label}}</label>
@if($type === 'textarea')
    <textarea wire:model.lazy="{{$name}}" id="{{$name}}" class="lms-input" placeholder="{{$placeholder}}" {{$required}}></textarea>
@else
    <input type="{{$type}}" wire:model.lazy="{{$name}}" id="{{$name}}"  class="lms-input" placeholder="{{$placeholder}}" {{$required}} />
@endif
@error($name)
<p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
@enderror

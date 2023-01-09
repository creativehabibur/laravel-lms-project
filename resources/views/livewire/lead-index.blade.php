<div>
    <div class="table w-full p-2">
        <table class="w-full border">
            <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Name
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Email
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Phone
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Registered
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Action
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($leads as $lead)
            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                <td class="p-2 border-r text-left px-4">{{$lead->name}}</td>
                <td class="p-2 border-r text-left px-4">{{$lead->email}}</td>
                <td class="p-2 border-r text-left">{{$lead->phone}}</td>
                <td class="p-2 border-r">{{date('Y-m-d',strtotime($lead->created_at))}}</td>
                <td class="flex items-center justify-center">
                    <a href="{{route('lead.edit',$lead->id)}}" class="bg-blue-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.edit')</a>
                    <a href="{{route('lead.show',$lead->id)}}" class="bg-green-500 p-2 mx-3 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.eye')</a>
                    <form wire:submit.prevent="leadDelete({{$lead->id}})" class="bg-red-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">
                        <button onclick="return confirm('you are sure to delete!')" type="submit">@include('components.icons.trash')</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{$leads->links()}}
        </div>
    </div>
</div>

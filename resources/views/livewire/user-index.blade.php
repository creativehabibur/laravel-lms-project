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
                        Role
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
            @foreach($users as $user)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r text-left px-4">{{$user->name}}</td>
                    <td class="p-2 border-r text-left px-4">{{$user->email}}</td>
                    <td class="p-2 border-r text-left">
                       <div class="flex gap-4 flex-wrap">
                           @foreach($user->roles as $role)
                               <p class="py-1 px-2 bg-green-500 text-white rounded">{{$role->name}}</p>
                           @endforeach
                       </div>
                    </td>
                    <td class="flex items-center gap-4 justify-center">
                        <a href="{{route('user.edit',$user->id)}}" class="bg-blue-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.edit')</a>
                        <form wire:submit.prevent="userDelete({{$user->id}})" class="bg-red-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">
                            <button onclick="return confirm('you are sure to delete!')" type="submit">@include('components.icons.trash')</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{$users->links()}}
        </div>
    </div>
</div>

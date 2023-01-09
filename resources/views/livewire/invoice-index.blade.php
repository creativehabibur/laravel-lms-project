<div>
    <div class="table w-full p-2">
        <table class="w-full border">
            <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        ID
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
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
                        Due Date
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Amount
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Paid
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Due
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
            @foreach($invoices as $invoice)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r text-left px-4">{{$invoice->id}}</td>
                    <td class="p-2 border-r text-left px-4">{{$invoice->user->name}}</td>
                    <td class="p-2 border-r text-left px-4">{{date('F j Y',strtotime($invoice->due_date))}}</td>
                    <td class="p-2 border-r text-left px-4">{{$invoice->amount()['amount']}}</td>
                    <td class="p-2 border-r text-left px-4">{{$invoice->amount()['paid']}}</td>
                    <td class="p-2 border-r text-left px-4">{{$invoice->amount()['due']}}</td>
                    <td class="flex items-center justify-center">
                        <a href="" class="bg-blue-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.edit')</a>
                        <a href="{{route('invoice',$invoice->id)}}" class="bg-green-500 p-2 mx-3 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.eye')</a>
                        <form wire:submit.prevent="" class="bg-red-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">
                            <button onclick="return confirm('you are sure to delete!')" type="submit">@include('components.icons.trash')</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{$invoices->links()}}
        </div>
    </div>
</div>

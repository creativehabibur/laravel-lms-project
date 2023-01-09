<x-app-layout>
    <x-slot name="header">
        <div class="flex  justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit User') }}
            </h2>
                <a href="{{route('user.index')}}" class="lms-btn bg-gray-600">
                    Back
                </a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <livewire:user-edit :user_id="$id" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

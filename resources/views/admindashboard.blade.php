<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="text-left">Ticket ID</th>
                                <th scope="col" class="text-left">Ticket Type</th>
                                <th scope="col" class="text-left">Ticket Description</th>
                                <th scope="col" class="text-left">Address Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td class="px-46 py-4 whitespace-nowrap">{{$ticket->id}}</td>
                                    <td class="px-46 py-4 whitespace-nowrap">{{$ticket->ticket_type}}</td>
                                    <td class="px-46 py-4 whitespace-nowrap">{{$ticket->ticket_description}}</td>
                                    <td class="px-46 py-4 whitespace-nowrap"><a href="{{route('auth.reply', ['ticket' => $ticket])}}">Reply</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


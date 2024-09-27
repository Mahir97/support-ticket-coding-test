<x-guest-layout>
    <form method="POST">
        @csrf

        <!-- Name -->
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="text-left">Ticket ID</th>
                    <th scope="col" class="text-left">Ticket Type</th>
                    <th scope="col" class="text-left">Ticket Description</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-46 py-4 whitespace-nowrap">{{$ticket->id}}</td>
                    <td class="px-46 py-4 whitespace-nowrap">{{$ticket->ticket_type}}</td>
                    <td class="px-46 py-4 whitespace-nowrap">{{$ticket->ticket_description}}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="ticket_reply" :value="__('Reply to Ticket')" />
            <textarea id="ticket_reply" class="block mt-1 w-full" type="text" name="ticket_reply" :value="old('ticket_reply')" required> </textarea>
            <x-input-error :messages="$errors->get('ticket_reply')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4" action="{{route('auth.address', ['ticket' => $ticket])}}">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

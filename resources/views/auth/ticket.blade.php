<x-guest-layout>
    <form method="POST">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="ticket_type" :value="__('Ticket Type')" />
            <select name="ticket_type" id="ticket_type" class="form-control">
                <option value="Service Problem" selected>Service Problem</option>
                <option value="Bill Problem">Bill Problem</option>
            </select>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="ticket_description" :value="__('Ticket Description')" />
            <textarea id="ticket_description" class="block mt-1 w-full" type="text" name="ticket_description" :value="old('ticket_description')" required> </textarea>
            <x-input-error :messages="$errors->get('ticket_description')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4" action="{{ route('auth.entry') }}">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

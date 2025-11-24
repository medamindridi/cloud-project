<x-app-layout>
    

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div id="messages" class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($chats as $chat)
                        <b>
                            <p style="display:inline">{{ $chat["user"]["name"] }} : </p>
                        </b>
                        <p style="display:inline">{{ $chat["message"] }}</p><br>
                    @endforeach
                </div>
                <form id="chatForm">
  <input type="text" id="message" name="message" placeholder="Type your message..." required>
  <button type="submit">Send</button>
</form>
            </div>
        </div>
    </div>

</x-app-layout>
@vite(['resources/js/chat.js'])
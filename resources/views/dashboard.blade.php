<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="my-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="border-b-2 border-slate-200">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-6">
                        {{ __('Experiments') }}
                    </h2>
                </div>
                <div class="p-6 ">
                    <a href=""
                        class="text-gray-900 dark:text-gray-100 hover:text-gray-700 dark:hover:text-gray-300 hover:font-bold">
                        1. Realtime Chat
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Echo.channel('notification').listen('notification.update', function(data) {
                alert(data.message);
            });
            console.log('Listening to notification channel...');
        });
    </script>
</x-app-layout>

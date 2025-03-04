<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('articles.index') }}"
                        class="px-4 py-2 font-bold text-white bg-blue-500 rounded shadow-lg shadow-blue-950 hover:bg-blue-700">
                        Voir le blog
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

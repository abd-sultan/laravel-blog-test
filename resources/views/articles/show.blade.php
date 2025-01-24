<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold">{{ $article->title }}</h1>
                        <div class="mt-4">
                            {!! $article->content !!}
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                    <div class="mt-4">
                        <a href="{{ route('articles.edit', $article->slug) }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Modifier
                        </a>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('articles.index', $article->slug) }}" class="px-4 py-2 font-bold text-white bg-gray-900 rounded hover:bg-gray-700">
                            Voir les autres articles
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
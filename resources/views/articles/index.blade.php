<x-guest-layout>
    <div class="w-full py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold">Articles</h2>
                        @auth
                            <a href="{{ route('articles.create') }}"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                Nouvel Article
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 font-bold text-white bg-gray-900 rounded-lg hover:bg-gray-700">
                                Se connecter
                            </a>
                        @endauth
                    </div>
                    <div class="space-y-4">
                        @foreach ($articles as $article)
                            <div class="pb-2 border-b">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="text-lg text-blue-600 hover:text-blue-800">
                                    {{ $article->title }}
                                </a>
                                @if ($article->category)
                                    <span class="px-2 py-1 ml-2 text-sm bg-gray-200 rounded">
                                        {{ $article->category->name }}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold">{{ $article->title }}</h1>
                        @if ($article->category)
                            <div class="mt-2">
                                <span class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-full">
                                    {{ $article->category->name }}
                                </span>
                            </div>
                        @endif
                        <div class="mt-6 prose prose-lg max-w-none article-content">
                            {!! clean($article->content) !!}
                        </div>
                    </div>
                    @auth
                        <div class="flex mt-4 space-x-4">
                            <a href="{{ route('articles.edit', $article->slug) }}"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                Modifier
                            </a>
                            <form action="{{ route('articles.destroy', $article->slug) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    @endauth
                    <div class="mt-4">
                        <a href="{{ route('articles.index', $article->slug) }}"
                            class="px-4 py-2 font-bold text-white bg-gray-900 rounded hover:bg-gray-700">
                            Voir les autres articles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

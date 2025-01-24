<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-2xl font-bold">Modifier l'article</h2>
                    
                    <form action="{{ route('articles.update', $article->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Titre</label>
                            <input type="text" name="title" id="title" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" value="{{ old('title', $article->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block mb-2 text-sm font-bold text-gray-700">Contenu</label>
                            <textarea name="content" id="content" rows="10" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ old('content', $article->content) }}</textarea>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                Mettre à jour l'article
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
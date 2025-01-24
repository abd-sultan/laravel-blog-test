<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-2xl font-bold">
                        {{ isset($article) ? 'Modifier l\'article' : 'Créer un nouvel article' }}
                    </h2>

                    <form
                        action="{{ isset($article) ? route('articles.update', $article->slug) : route('articles.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($article))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Titre</label>
                            <input type="text" name="title" id="title"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                value="{{ old('title', $article->title ?? '') }}" required>
                            @error('title')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category_id"
                                class="block mb-2 text-sm font-bold text-gray-700">Catégorie</label>
                            <select name="category_id" id="category_id"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow focus:outline-none focus:shadow-outline">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $article->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block mb-2 text-sm font-bold text-gray-700">Contenu</label>
                            <textarea name="content" id="content"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none tinymce focus:outline-none focus:shadow-outline"
                                rows="10">{{ old('content', $article->content ?? '') }}</textarea>
                            @error('content')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                {{ isset($article) ? 'Mettre à jour' : 'Créer' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- TinyMCE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.tinymce',
            plugins: 'lists link image table code help wordcount media',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image media | removeformat code',
            height: 500,
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; }',
            menubar: true,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true
        });
    </script>
</x-app-layout>

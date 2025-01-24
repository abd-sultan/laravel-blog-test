<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-2xl font-bold">Créer un nouvel article</h2>
                    
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                          <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Catégorie</label>
                          <select name="category_id" id="category_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                              <option value="">Sélectionner une catégorie</option>
                              @foreach($categories as $category)
                                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                      {{ $category->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                        
                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Titre</label>
                            <input type="text" name="title" id="title" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block mb-2 text-sm font-bold text-gray-700">Contenu</label>
                            <textarea name="content" id="content" rows="10" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                Créer l'article
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $article = Article::create($validated);

        return redirect()->route('articles.show', $article->slug)
            ->with('success', 'Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $article->update($validated);

        return redirect()->route('articles.show', $article->slug)
            ->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article supprimé avec succès.');
    }
}

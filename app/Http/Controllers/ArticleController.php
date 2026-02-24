<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.articles.index', ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.articles.form', ['categories' => Category::where('is_active', 1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // Valider les données
        $data = $request->validated();

        // Gestion de l'image si upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $data['image'] = $imagePath;
        }

        // Ajouter l'auteur
        $data['author_id'] = Auth::id();

        // Création de l'article
        $article = Article::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'] ?? null,
            'is_active' => $data['is_active'],
            'is_commentable' => $data['is_commentable'],
            'is_shareable' => $data['is_shareable'],
            'category_id' => $data['category_id'],
            'author_id' => $data['author_id'],
        ]);

        return redirect()->route('article.index')->with('success', 'Article créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('back.articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('back.articles.form', ['article' => $article, 'categories' => Category::where('is_active', 1)->get()]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ArticleRequest $request, Article $article)
    {
        // 1️⃣ Valider les données
        $data = $request->validated();

        // 2️⃣ Gérer l'image si upload
        if ($request->hasFile('image')) {
            // Optionnel : supprimer l'ancienne image pour éviter les fichiers inutiles
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('articles', 'public');
            $data['image'] = $imagePath;
        }

        // 3️⃣ Conserver l'auteur existant
        $data['author_id'] = $article->author_id; // ou Auth::id() si tu veux changer

        // 4️⃣ Mise à jour de l'article
        $article->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'] ?? $article->image,
            'is_active' => $data['is_active'],
            'is_commentable' => $data['is_commentable'],
            'is_shareable' => $data['is_shareable'],
            'category_id' => $data['category_id'],
            'author_id' => $data['author_id'],
        ]);

        return redirect()->route('article.index')->with('success', 'Article mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('success', 'Article supprimé avec succès');
    }
}

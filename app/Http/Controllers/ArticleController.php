<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        Article::create([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}

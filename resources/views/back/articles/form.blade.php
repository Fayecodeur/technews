@extends('back.layout.app')
@section('title', 'Ajouter un article')
@section('header-title', 'Ajouter un article')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <!-- Titre -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Titre de l'article</label>
                            <input
                                class="form-control"
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                            />
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Catégorie -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Catégorie</label>
                            <select class="form-select" name="category_id">
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ old('category_id') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <!-- Image -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Uploader une image</label>
                            <div class="custom-file mb-3">
                                <input
                                    type="file"
                                    class="custom-file-input"
                                    id="customFile"
                                    name="image"
                                />
                                <label class="custom-file-label" for="customFile">Choisir une image</label>
                            </div>
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea
                                class="form-control"
                                rows="5"
                                name="description"
                            >{{ old('description') }}</textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Publication -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Publication</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                type="radio"
                                class="form-check-input"
                                id="article_active"
                                name="is_active"
                                value="1"
                                {{ old('is_active', 1) == 1 ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="article_active">Publier</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                type="radio"
                                class="form-check-input"
                                id="article_inactive"
                                name="is_active"
                                value="0"
                                {{ old('is_active') == 0 ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="article_inactive">Ne pas publier</label>
                        </div>
                        @error('is_active')
                        <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Partages -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Partages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                type="radio"
                                class="form-check-input"
                                id="article_share_active"
                                name="is_shareable"
                                value="1"
                                {{ old('is_shareable', 1) == 1 ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="article_share_active">Partageable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                type="radio"
                                class="form-check-input"
                                id="article_share_inactive"
                                name="is_shareable"
                                value="0"
                                {{ old('is_shareable') == 0 ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="article_share_inactive">Non partageable</label>
                        </div>
                        @error('is_shareable')
                        <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Commentaires -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Commentaires</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                type="radio"
                                class="form-check-input"
                                id="article_comment_active"
                                name="is_commentable"
                                value="1"
                                {{ old('is_commentable', 1) == 1 ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="article_comment_active">Autorisé</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                type="radio"
                                class="form-check-input"
                                id="article_comment_inactive"
                                name="is_commentable"
                                value="0"
                                {{ old('is_commentable') == 0 ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="article_comment_inactive">Non autorisé</label>
                        </div>
                        @error('is_commentable')
                        <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Bouton -->
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary block w-25">
                            Enregistrer l'article
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

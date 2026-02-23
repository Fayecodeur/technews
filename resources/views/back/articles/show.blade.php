@extends('back.layout.app')
@section('title', 'Article')
@section('header-title', "Détail de l'article")

@section('content')
    <div class="row mt-3 justify-center">
        <div class="col-md-9 ">
            <div class="blog-view">
                <article class="blog blog-single-post">
                    <h3 class="blog-title">Titre : {{ $article->title }}</h3>

                    <div class="blog-image">
                        <img
                            alt="Image de l'article"
                            src="{{ $article->imageUrl() }}"
                            class="img-fluid mt-4 rounded"
                            style="max-height: 400px; object-fit: cover;"
                        >
                    </div>

                    <div class="blog-content mt-4">
                        <p>
                            {!! nl2br(e($article->description)) !!}
                        </p>
                    </div>
                </article>

                <div class="widget author-widget clearfix mt-4">
                    <h3>À propos de l'auteur</h3>
                    <div class="about-author d-flex align-items-start">
                        <div class="about-author-img me-3">
                            <div class="author-img-wrap">
                                <img
                                    class="rounded-circle object-fit-cover"
                                    width="100"
                                    height="100"
                                    alt="Auteur"
                                    src="{{ asset('storage/profile/' . $article->author->image) }}"
                                >
                            </div>
                        </div>

                        <div class="author-details">
                        <span class="blog-author-name fw-bold">
                            {{ $article->author->name }}
                        </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@extends('back.layout.app')
@section('title', 'Liste des articles')
@section('header-title', 'Articles')
@section('content')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Articles</h4>
                <a href="{{route('article.create')}}" class="btn btn-primary float-right veiwbutton ">Ajouter un article</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table class="table-sm table-stripped table table-hover table-center mb-0 ">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Categorie</th>
                                <th>Publication</th>
                                <th>Partage</th>
                                <th>Commentaires</th>
                                <th>Auteur</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->category->name}}</td>
                                    <td>
                                        @if($article->is_active )
                                            <span class="btn btn-sm bg-success-light mr-2">Activé</span>
                                        @else
                                            <span class="btn btn-sm bg-danger-light mr-2">Désactivé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($article->is_shareable )
                                            <span class="btn btn-sm bg-success-light mr-2">Activé</span>
                                        @else
                                            <span class="btn btn-sm bg-danger-light mr-2">Désactivé</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($article->is_commentable )
                                            <span class="btn btn-sm bg-success-light mr-2">Activé</span>
                                        @else
                                            <span class="btn btn-sm bg-danger-light mr-2">Désactivé</span>
                                        @endif
                                    </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <img
                                                src="{{ asset('storage/profile/' . $article->author->image) }}"
                                                alt="Auteur"
                                                class="rounded-circle object-fit-cover"
                                                width="50"
                                                height="50"
                                            >
                                            <span>
                                             {{$article->author->name}}
                                            </span>
                                        </h2>
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a
                                                href="#"
                                                class="action-icon dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('article.show', $article)}}">
                                                    <i class="fas fa-pencil-alt m-r-5"></i> Voir
                                                </a>

                                                <a class="dropdown-item" href="{{route('article.edit', $article)}}">
                                                    <i class="fas fa-pencil-alt m-r-5"></i> Modifier
                                                </a>

                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                    data-toggle="modal"
                                                    data-target="#delete_asset"
                                                >
                                                    <form action="{{route('article.destroy', $article)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                    <button class="btn btn-sm text-danger">
                                                        <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                                    </button>
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

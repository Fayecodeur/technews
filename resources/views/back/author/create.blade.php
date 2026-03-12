@extends('back.layout.app')
@section('title', @isset($author) ? 'Modifier un auteur' : 'Ajouter un auteur')
@section('header-title', @isset($author) ? 'Modifier un auteur' : 'Ajouter un auteur')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 ">
            <form
                action="{{ isset($author) ? route('author.update',$author) : route('author.store') }}"
                method="POST"
                class="border p-5 shadow-sm"
            >
                @csrf
        @if(isset($author))
            @method('PUT')
        @endif
                <div class="form-group">
                    <label>Nom</label>
                    <input
                        class="form-control"
                        type="text"
                        name="name"
                        value="{{ old('name', $author->name ?? '') }}"
                    />
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input
                        class="form-control"
                        type="email"
                        name="email"
                        value="{{ old('email', $author->email ?? '') }}"
                    />
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        Enregistrer
                    </button>

                    <a href="{{ route('author.index') }}" class="btn btn-secondary">
                        Retour
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection

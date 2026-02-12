@extends('back.layout.app')
@section('title', @isset($category) ? 'Modifier un categorie' : 'Ajout de categorie')

@section('content')
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="card-title m-0"> {{isset($category) ? 'Modifier ' : 'Ajouter '}} une catégorie</h4>
            <a href="{{ route('category.index') }}" class="btn btn-primary">
                Retour
            </a>
        </div>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-lg-8 ">
            <form action="{{isset($category) ? route('category.update', $category) : route('category.store')}}" method="POST" class="shadow p-5">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group mb-3">
                    <label>Nom de la catégorie</label>
                    <input class="form-control" type="text" name="name" value="{{old('name', $category->name ?? '')}}" />
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea
                        class="form-control"
                        rows="5"
                        id="comment"
                        name="description">{{old('description',  $category->description ?? '')}}</textarea>
                    @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group mb-4">
                    <label>Activation</label>
                    <select class="form-control" id="sel2" name="is_active">
                        <option value="1" {{ old('is_active', $category->is_active ?? '1') == '1' ? 'selected' : '' }}>Activer</option>
                        <option value="0" {{ old('is_active', $category->is_active ?? '0') == '0' ? 'selected' : '' }}>Ne pas activer</option>
                    </select>

                    @error('is_active')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">
                   {{isset($category) ? 'Modifier' :  'Enregistrer'}}
                </button>
            </form>
        </div>
    </div>

@endsection

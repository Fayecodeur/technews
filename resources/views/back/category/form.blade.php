@extends('back.layout.app')
@section('title', 'Ajout de categorie')

@section('content')
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="card-title m-0">Ajouter une catégorie</h4>
            <a href="{{ route('category.index') }}" class="btn btn-primary">
                Retour
            </a>
        </div>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-lg-8 ">
            <form action="{{route('category.store')}}" method="POST" class="shadow p-5">
                @csrf
                <div class="form-group mb-3">
                    <label>Nom de la catégorie</label>
                    <input class="form-control" type="text" name="name" value="{{old('name')}}" />
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
                        name="description">{{old('description')}}</textarea>
                    @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group mb-4">
                    <label>Activation</label>
                    <select class="form-control" id="sel2" name="is_active">
                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Activer</option>
                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Ne pas activer</option>
                    </select>

                    @error('is_active')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>

@endsection

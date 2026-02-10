@extends('back.layout.app')
@section('title', 'Profil')
@section('header-title', 'Informations personnelle')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#"> <img src="{{ asset('storage/profile/' . Auth::user()->image) }}"
                                alt="Photo de profil">

                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-3">{{ Auth::user()->name }}</h4>
                        <h6 class="text-muted mt-1">Admin</h6>
                    </div>

                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#per_details_tab">A propos</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password_tab">Mot de passe</a> </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Informations Personelles</span>
                                        <!-- Alert succès -->

                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                class="fa fa-edit mr-1"></i>Modifier
                                        </a>
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Nom</p>
                                        <p class="col-sm-9">{{ Auth::user()->name }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
                                        <p class="col-sm-9">
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Informations Personnelles</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('profile.update') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')

                                                <div class="row form-row">

                                                    <!-- Nom -->
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom</label>
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ old('name', Auth::user()->name) }}" required>
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="{{ old('email', Auth::user()->email) }}" required>
                                                            @error('email')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Image -->
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Photo de profil</label>
                                                            <input type="file" class="form-control" name="image"
                                                                accept="image/*">
                                                            @error('image')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <button type="submit" class="btn btn-primary btn-block">Enregistrer les
                                                    modifications</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Modifier le mot de passe</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Ancien mot de passe</label>
                                            <input type="password" name="current_password" class="form-control">
                                            @error('current_password', 'updatePassword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Nouveau mot de passe</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password', 'updatePassword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Confirmer mot de passe</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                            @error('password_confirmation', 'updatePassword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary" type="submit">Enregistrer les
                                            modifications</button>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

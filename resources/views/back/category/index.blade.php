@extends('back.layout.app')
@section('title', 'Liste des catégories')
@section('header-title', 'Catégories')
@section('content')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-2">
                <h4 class="card-title float-left mt-2">Liste des categories</h4>
                <a
                    href="{{route('category.create')}}"
                    class="btn btn-primary float-right veiwbutton"
                >Ajouter une categorie</a
                >
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table class="table-stripped table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>ID Categorie</th>
                                <th>Nom</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>CAT-00{{$categorie->id}}</td>
                                    <td>{{$categorie->name}}</td>
                                    <td>
                                        <span class="badge p-2 {{$categorie->is_active ? ' rounded-pill text-bg-success' : 'rounded-pill text-bg-danger'}}">
                                            {{$categorie->is_active ? 'Active' : 'Désactivé'}}
                                        </span>
                                    </td>
                                    <td>{{$categorie->description ?? 'Pas de description'}}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-categorie.html"><i class="fas fa-pencil-alt m-r-5"></i> Modifier</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i> Supprimer</a> </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>

                            <div id="delete_asset" class="modal fade delete-modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <img src="assets/img/sent.png" alt="" width="50" height="46" />
                                            <h3 class="delete_class">
                                                Etes vous sure de vouloir supprimer cet element ?
                                            </h3>
                                            <div class="m-t-20">
                                                <a href="#" class="btn btn-white" data-dismiss="modal"
                                                >Fermer</a
                                                >
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

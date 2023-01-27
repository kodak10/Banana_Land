@extends('layouts.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
                    <li class="breadcrumb-item active">Utilisateur</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shadow-sm p-5 mb-5 bg-body-tertiary rounded">
                        <div class="content">
                            <div class="content-header d-flex justify-content-between">
                                <span>Liste des Utilisateurs</span>
                                <a class="btn btn-primary" href="{{ route('utilisateur.create') }}">Ajouter un Utilisateur</a>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success mt-3">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-hover mt-5 ">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="selectAll">
                                                <label for="selectAll"></label>
                                            </span>
                                        </th>
                                        <th>Nom d'utilisateur</th>
                                        <th>Email</th>
                                        <th>Fonction</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($utilisateurs as $utilisateur)
                                        @if($utilisateur->count() === 1)
                                            <span>Aucun enregistrement</span>
                                        @else

                                        <tr>
                                            <td>
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                    <label for="checkbox1"></label>
                                                </span>
                                            </td>
                                            <td>{{ $utilisateur->username }}</td>
                                            <td>{{ $utilisateur->email }}</td>
                                            <td>{{ $utilisateur->fonction }}</td>

                                            <td>
                                                <form action="{{ route('utilisateur.destroy',$utilisateur->id) }}" method="Post">
                                                    <a class="btn btn-primary" href="{{ route('utilisateur.edit',$utilisateur->id) }}">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash" style="color: red;"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex">
                                {!! $utilisateurs->links() !!}
                            </div>
                        </div>
                    </div>



                </div>



            </div>
        </section>

    </main>
@endsection

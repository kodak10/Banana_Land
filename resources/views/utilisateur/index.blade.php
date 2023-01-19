@extends('layouts.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
            <li class="breadcrumb-item active">Utilisateur</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="shadow-sm p-5 mb-5 bg-body-tertiary rounded">
                    <div class="content">
                        <div class="content-header d-flex justify-content-between">
                            <span>Liste des Utilisateurs</span>
                            <a href="{{ route('utilisateur.create') }}">Ajouter un Utilisateur</a>
                        </div>
                    </div>



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
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>



            </div>



        </div>
        </section>

    </main><!-- End #main -->
@endsection

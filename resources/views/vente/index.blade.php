@extends('layouts.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
            <li class="breadcrumb-item active">Vente</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="shadow-sm p-5 mb-5 bg-body-tertiary rounded">
                    <div class="content">
                        <div class="content-header d-flex justify-content-between">
                            <span>Liste des Ventes</span>
                            <a href="{{ route('vente.create') }}">Ajouter une Vente</a>
                        </div>
                    </div>


                    <div class="table-responsive">
                            <table class="table table-striped table-hover mt-5">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="selectAll">
                                            <label for="selectAll"></label>
                                        </span>
                                    </th>
                                    <th>Nom du Recouvreur</th>
                                    <th>Nom du plat</th>
                                    <th>Quantité</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventes as $vente)
                                    <tr>
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                <label for="checkbox1"></label>
                                            </span>
                                        </td>
                                        <td>{{ $vente->username }}</td>
                                        <td>{{ $vente->plat }}</td>
                                        <td>{{ $vente->qte }}</td>

                                        <td>
                                            <form action="{{ route('vente.destroy',$vente->id) }}" method="Post">
                                                <a class="btn btn-primary" href="{{ route('vente.edit',$vente->id) }}">
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






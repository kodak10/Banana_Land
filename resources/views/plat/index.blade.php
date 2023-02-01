@extends('layouts.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
                <li class="breadcrumb-item active">Plat</li>
            </ol>
        </nav>
        </div>

        <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="shadow-sm p-5 mb-5 bg-body-tertiary rounded">
                    <div class="content">
                        <div class="content-header d-flex justify-content-between">
                            <span>Liste des Plats</span>
                            <a  class="btn btn-primary" href="{{ route('plat.create') }}">Ajouter un Plat</a>
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
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Image</th>
                                    <th>Disponible</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($plats as $plat)
                                        @if($plat->count() === 1)
                                        <span>Aucun enregistrement</span>
                                    @else
                                        <tr>
                                            <td>
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                    <label for="checkbox1"></label>
                                                </span>
                                            </td>
                                            <td>{{ $plat->nom }}</td>
                                            <td>{{ $plat->description }}</td>
                                            <td>{{ $plat->prix }}</td>
                                            <td><img src="/images/plats/{{ $plat->images }}" alt="Image" style="width:60px; height:60px"></td>
                                            <td>{{ $plat->disponible }}</td>

                                            <td>
                                                <form action="{{ route('plat.destroy',$plat->id) }}" method="Post">
                                                    <a class="btn btn-primary" href="{{ route('plat.edit',$plat->id) }}">
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
                            {{$plats->links()}}
                        </div>

                    </div>

                </div>

            </div>


        </div>
        </section>

    </main>
@endsection

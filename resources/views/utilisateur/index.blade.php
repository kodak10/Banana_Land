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



                <table class="table table-striped table-hover mt-5">
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





                                {{-- <td>
                                    <a href="" class="edit"></a>
                                    <a href="{{route('utilisateur.destroy',$utilisateur->id) }}" class="delete"></a>


                                </td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="clearfix mt-3">
                    <div class="hint-text mb-3">Showing <b>5</b> out of <b>100</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Précedent</a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item "><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Suivant</a></li>
                    </ul>
                </div>


            </div>



          </div>



      </div>
    </section>

</main><!-- End #main -->
@endsection

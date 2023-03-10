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
        </div>

        <section class="section dashboard">
            <div class="container ventes">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shadow-sm p-5 mb-5 bg-body-tertiary rounded">
                            <div class="row">
                                @foreach ($plats as $plat)
                                    <div class="col-lg-3 col-md-6 mr-3">
                                        <div class="card text-center fw-bold w-100">
                                            <img src="/images/plats/{{ $plat->images }}" class="card-img-top" alt="Image">
                                            <div class="card-body">
                                                    <h5 class="card-title">{{$plat->nom}}</h5>
                                                    <p class="card-text">{{$plat->description}}</p>
                                                    <p class="card-text text-danger">{{$plat->prix}} FCFA</p>
                                                <form action="{{ route('panier.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $plat->id }}" name="plats_id">
                                                        <button class="btn btn-primary p-1 w-100 fw-bold"><i class="fa-solid fa-cart-plus"></i> Ajouter</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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






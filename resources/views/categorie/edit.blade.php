@extends('layouts.master')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
                <li class="breadcrumb-item active">Catégorie de plat</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="container p-3">

            <div class="section-header">
                <h4 class="section-title">Modification de la Catégorie</h4>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('categorie.update',$categorie_plats->id) }}" enctype="multipart/form-data" >

                @csrf
                @method('PUT')
                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Nom de la Catégorie") }}</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"  value="{{ $categorie_plats->nom }}">
                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Image") }}</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $categorie_plats->image }}">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-0 mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">
                            {{ __('Mettre à jour') }}
                        </button>
                        <a  href="{{route('categorie.index')}}" class="btn btn-danger">
                            {{ __('Annuler') }}
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </section>

</main>
@endsection

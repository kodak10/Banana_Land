@extends('layouts.master')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
          <li class="breadcrumb-item active">Plats</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container p-3">

            <div class="section-header">
                <h4 class="section-title">Ajouter un Plats</h4>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('plat.store') }}" enctype="multipart/form-data" >


                @csrf
                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Catégorie du Plat") }}</label>
                        <select class="form-select" aria-label="" name="disponible" @error('disponible') is-invalid @enderror" name="disponible" value="{{ old('disponible') }}" required>
                            @foreach ($categorieplat->plat as $categorie_plat )
                                <option value="{{$categorie_plat->nom}}" >{{$categorie_plat->nom}}</option>
                            @endforeach
                         </select>
                        @error('disponible')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Nom du plat") }}</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"  value="{{ old('nom') }}" required autocomplete="nom">
                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Images") }}</label>
                        <input type="file" name="images" class="form-control @error('images') is-invalid @enderror"  value="{{ old('images') }}" required autocomplete="images">
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">


                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Disponible") }}</label>
                        <select class="form-select" aria-label="" name="disponible" @error('disponible') is-invalid @enderror" name="disponible" value="{{ old('disponible') }}" required>
                                <option value="Oui" >Oui</option>
                                <option value="Non" >Non</option>
                         </select>
                        @error('disponible')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Prix") }}</label>
                        <input type="text" name="prix" class="form-control @error('prix') is-invalid @enderror"  value="{{ old('prix') }}" required autocomplete="prix">
                        @error('prix')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="col-form-label text-md-end">{{ __("Description") }}</label>
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"rows="3"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-0 mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Enregistrer') }}
                        </button>
                        <a  href="{{route('plat.index')}}" class="btn btn-danger">
                            {{ __('Retour') }}
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </section>

</main><!-- End #main -->
@endsection

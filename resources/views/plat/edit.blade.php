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
    </div>

    <section class="section dashboard">
        <div class="container p-3">

            <div class="section-header">
                <h4 class="section-title">Modification du plat</h4>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('plat.update',$plats->id) }}" enctype="multipart/form-data" >


                @csrf
                @method('PUT')
                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Catégorie du Plat") }}</label>
                        <select class="form-select" aria-label="" name="categories_id" @error('categories_id') is-invalid @enderror" disabled>
                            @foreach ($categories as $categorie)
                                <option @selected($categorie->id == $plats->categories_id) value="{{$categorie->id}}">{{$categorie->nom}}</option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Nom du plat") }}</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"  value="{{ $plats->nom }}" autocomplete="nom">
                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Images") }}</label>
                        <input type="file" name="images" class="form-control @error('images') is-invalid @enderror" value="images/plats/{{ $plats->image }}">
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
                        <select class="form-select" aria-label="" name="disponible" @error('disponible') is-invalid @enderror" name="disponible" required>
                            <option @selected($plats->disponible) value="{{$plats->disponible}}">{{$plats->disponible}}</option>
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
                        <input type="text" name="prix" class="form-control @error('prix') is-invalid @enderror"  value="{{ $plats->prix }}" required autocomplete="prix">
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
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $plats->description }}" autocomplete="description"rows="3"></textarea>
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
                            {{ __('Mettre à jour') }}
                        </button>
                        <a  href="{{route('plat.index')}}" class="btn btn-danger">
                            {{ __('Retour') }}
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </section>

</main>
@endsection

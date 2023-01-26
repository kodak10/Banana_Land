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
                <h4 class="section-title">Ajouter un Plats</h4>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('plat.update',$plat->id) }}" enctype="multipart/form-data" >


                @csrf
                @method('PUT')
                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Catégorie du Plat") }}</label>
                        <select class="form-select" aria-label="" name="categories_id" @error('categories_id') is-invalid @enderror" value="{{ old('categories_id') }}" disabled>
                            <option value="{{ $plat->id }}">{{$plat->categories_id}}</option>
                         </select>
                        @error('categories_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Nom du plat") }}</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"  value="{{ $plat->nom }}" autocomplete="nom">
                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Images") }}</label>
                        <input type="file" name="images" class="form-control @error('images') is-invalid @enderror"  value="{{ $plat->image }}" autocomplete="images">
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
                        <select class="form-select" aria-label="" name="disponible" @error('disponible') is-invalid @enderror" name="disponible" value="{{ $plat->disponible }}" required>
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
                        <input type="text" name="prix" class="form-control @error('prix') is-invalid @enderror"  value="{{ $plat->prix }}" required autocomplete="prix">
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
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $plat->description }}" autocomplete="description"rows="3"></textarea>
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

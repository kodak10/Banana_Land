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
        <div class="container p-3">

            <div class="section-header">
                <h4 class="section-title">Ajouter un Utilisateur</h4>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('utilisateur.store') }}" enctype="multipart/form-data" >

                @csrf
                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Nom d'utilisateur") }}</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"  value="{{ old('username') }}" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Email") }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-12">
                        <label class="col-form-label text-md-end">{{ __("Fonction") }}</label>
                        <select class="form-select" aria-label="" name="fonction" @error('fonction') is-invalid @enderror" name="fonction" value="{{ old('fonction') }}" required>
                            <option value="Administrateur">Administrateur</option>
                            <option value="Recouvreur">Recouvreur</option>
                            <option value="Comptable">Comptable</option>
                        </select>
                        @error('fonction')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Mot de passe") }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Confirmer le Mot de passe") }}</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                        @error('password_confirmation')
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
                        <a  href="{{route('utilisateur.index')}}" class="btn btn-danger">
                            {{ __('Retour') }}
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </section>

</main>
@endsection

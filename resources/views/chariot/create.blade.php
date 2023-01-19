@extends('layouts.master')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
          <li class="breadcrumb-item active">Chariot</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container p-3">

            <div class="section-header">
                <h4 class="section-title">Ajouter un Chariot</h4>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('chariot.store') }}" enctype="multipart/form-data" >


                @csrf
                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Nom Complet") }}</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"  value="{{ old('nom') }}" required autocomplete="nom">
                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("N° de Pièce") }}</label>
                        <input type="text" name="cni" class="form-control @error('cni') is-invalid @enderror"  value="{{ old('cni') }}" required autocomplete="cni">
                        @error('cni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                </div>


                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="col-form-label text-md-end">{{ __("Contact") }}</label>
                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"  value="{{ old('contact') }}" required autocomplete="contact">
                        @error('contact')
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
                        <a  href="{{route('chariot.index')}}" class="btn btn-danger">
                            {{ __('Retour') }}
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </section>

</main><!-- End #main -->
@endsection

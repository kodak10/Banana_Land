@extends('layouts.master')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
                    <li class="breadcrumb-item active">Panier</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shadow-sm p-5 mb-5 bg-body-tertiary rounded">
                            <div class="row">
                                <table class="w-full text-sm lg:text-base" cellspacing="0">
                                        <thead>
                                        <tr class="h-12 uppercase">
                                            <th class="hidden md:table-cell"></th>
                                            <th class="text-left">Nom du Plat</th>
                                            <th class="pl-5 text-left lg:text-right lg:pl-0">
                                            <span class="md:hidden" title="Quantity">Qte</span>
                                            <span class="hidden lg:inline">Quantité</span>
                                            </th>
                                            <th class="hidden text-right md:table-cell"> Prix</th>
                                            <th class="hidden text-right md:table-cell"> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paniers as $panier)
                                                <tr>
                                                    <td class="hidden pb-4 md:table-cell">
                                                        <a href="#">
                                                            <img src="{{ $panier->images }}" class="w-20 rounded" alt="Images">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#">
                                                            <p class="mb-2 md:ml-4 text-purple-600 font-bold">{{ $panier->nom }}</p>
                                                        </a>
                                                    </td>
                                                    <td class="justify-center mt-6 md:justify-end md:flex">
                                                        <form action="" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $panier->id}}" >
                                                            <input type="text" name="quantity" value="{{ $panier->qte }}"
                                                                class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                                                        </form>
                                                    </td>
                                                    <td class="hidden text-right md:table-cell">
                                                        <span class="text-sm font-medium lg:text-base">
                                                            {{ $panier->prix }} CFA
                                                        </span>
                                                    </td>
                                                    <td class="hidden text-right md:table-cell">

                                                        <form action="{{ route('panier.destroy',$panier->id) }}" method="Post">
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

                                <form action="{{ route('vente.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $panier->id }}" name="id">
                                    <input type="hidden" value="{{ $panier->images }}" name="images">
                                    <input type="hidden" value="{{ $panier->nom }}" name="nom">
                                    <input type="hidden" value="{{ $panier->description }}" name="description">
                                    <input type="hidden" value="{{ $panier->prix }}"  name="prix">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="btn btn-primary p-1 w-100 fw-bold">Valider la Commande</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection






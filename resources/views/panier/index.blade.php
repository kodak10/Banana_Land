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
                                        @foreach ($Paniers as $Panier)
                                            @if ($PanierItems->count() === 1)
                                                <span>Votre Panier est vide</span>
                                            @else
                                                <tr>
                                                    <td class="hidden pb-4 md:table-cell">
                                                        <a href="#">
                                                            <img src="images/plats/{{ $Panier->images }}" class="w-20 rounded" alt="Images" style="height: 80px; width:80px;">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#">
                                                            <p class="mb-2 md:ml-4 text-purple-600 font-bold">{{ $Panier->nom }}</p>
                                                        </a>
                                                    </td>
                                                    <form action="">
                                                        <td class="justify-center mt-6 md:justify-end md:flex">
                                                            <input type="text" name="qte" value="" class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                                                        </td>
                                                    </form>

                                                    <td class="hidden text-right md:table-cell">
                                                        <span class="text-sm font-medium lg:text-base">
                                                            {{ $Panier->prix }} CFA
                                                        </span>
                                                    </td>
                                                    <td class="hidden text-right md:table-cell">
                                                        <form action="{{ route('panier.destroy',$Panier->id) }}" method="Post">
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
                                        <form action="" method="POST">
                                            @csrf
                                            <input type="hidden" name="panier_id" value="{{ $Panier->id}}" >
                                            <button class="btn btn-primary mb-3">Valider</button>
                                        </form>
                                    </tbody>
                                </table>

                                <div class="d-flex">
                                    {{$Paniers->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection






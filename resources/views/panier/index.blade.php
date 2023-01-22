@extends('layouts.master')
@section('content')
    <div class="container">
        @foreach ($paniers as $panier)
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </td>
            <form method="POST" action="{{ route('panier.store') }}" enctype="multipart/form-data" >
                @csrf
                <td name="nom">{{ $panier->nom }}</td>
                <td name="description">{{ $panier->description }}</td>
                <td name="prix">{{ $panier->prix }}</td>
                <td>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </td>
            </form>
        </tr>
    @endforeach
    </div>
@endsection

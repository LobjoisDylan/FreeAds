@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">Toute les annonces<a href="{{ route('recherche') }}"> ou faire une recherche avancé</a></div>
    </div>
    <strong> Vous avez {{ $views->count() }} annonces sur cette page</strong><br>
    @foreach ($views as $view)
    <div class="col-md-4" style="height:269px">
      <h3>{{ $view['title'] }}</h3>
      <i>{{ $view['description'] }}</i><br>
      <img src="{{ $view['picture'] }}" alt="{{ $view['title'] }}" width="100" height="100"><br>
      <strong>{{ $view['price'] }} €</strong><br>
      {{ $view['type_de_produit'] }} <br>
      {{ $view['ville'] }} <br>
      @if($view['user_id'] == $users['id'])
      <a href="{{ route('annonce.edit', $view['annonce_id']) }}">Edit</a>
      <a href="{{ route('annonce.delete', $view['annonce_id']) }}">Delete</a>
      @endif
    </div>
    @endforeach
  </div>

  {{ $views->links() }}


</div>
@endsection

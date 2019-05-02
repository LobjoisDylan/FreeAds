@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading"></div>

      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('recherche') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Rechercher une annonce</label>

            <div class="col-md-6">
              <input id="title" type="text" class="form-control" name="recherche" value="Default" required autofocus>

              @if ($errors->has('title'))
              <span class="help-block">
                <strong>{{ $errors->first('recherche') }}</strong>
              </span>
              @endif
            </div>
          </div>


          <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
            <label for="ville" class="col-md-4 control-label">Ville</label>

            <div class="col-md-6">
              <select id="ville" type="text" class="form-control" name="ville" required>
                <option value="Default"></option>
                <option value="Paris">Paris</option>
                <option value="Lyon">Lyon</option>
                <option value="Marseille">Marseille</option>
              </select>
              @if ($errors->has('ville'))
              <span class="help-block">
                <strong>{{ $errors->first('ville') }}</strong>
              </span>
              @endif
            </div>
          </div>


          <div class="form-group{{ $errors->has('produit') ? ' has-error' : '' }}">
            <label for="ville" class="col-md-4 control-label">Produit</label>

            <div class="col-md-6">
              <select id="type_de_produit" type="text" class="form-control" name="type_de_produit" required>
                <option value="Default"></option>
                <option value="Vêtement">Vêtement</option>
                <option value="Humain">Humain</option>
                <option value="Voiture">Voiture</option>
                <option value="Technologie">Technologie</option>
                <option value="Outils">Outils</option>
                <option value="Peluche">Peluche</option>
              </select>
              @if ($errors->has('ville'))
              <span class="help-block">
                <strong>{{ $errors->first('ville') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Rechercher
              </button>
            </div>
          </div>
        </form>
        <div class="row">
          @foreach ($requetes as $requete)
          <div class="col-md-4" style="height:269px">
            <h3>{{ $requete['title'] }}</h3>
            <i>{{ $requete['description'] }}</i><br>
            <img src="{{ $requete['picture'] }}" width="100" height="100"><br>
            {{ $requete['price'] }} € <br>
            {{ $requete['ville'] }} <br>
            {{ $requete['type_de_produit'] }} <br>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

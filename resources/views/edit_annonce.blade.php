@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier son annonce <a href="{{ route('annonce') }}">ou revenir sur la page des annonces</a></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('annonce.edit', $selection['annonce_id']) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $selection['title'] }}" required autofocus>

                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $selection['description'] }}" required>

                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="picture" class="col-md-4 control-label">Picture</label>

                            <div class="col-md-6">
                                <input id="picture" type="text" class="form-control" name="picture" value="{{ $selection['picture'] }}" required>

                                @if ($errors->has('picture'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('picture') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $selection['price'] }}" required>

                                @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
                            <label for="ville" class="col-md-4 control-label">Choisir sa ville</label>

                            <div class="col-md-6">
                                <select id="ville" type="text" class="form-control" name="ville" required>
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

                        <div class="form-group{{ $errors->has('type_de_produit') ? ' has-error' : '' }}">
                            <label for="type_de_produit" class="col-md-4 control-label">Choisir son produit</label>

                            <div class="col-md-6">
                                <select id="type_de_produit" type="text" class="form-control" name="type_de_produit" required>
                                    <option value="Vêtement">Vêtement</option>
                                    <option value="Humain">Humain</option>
                                    <option value="Voiture">Voiture</option>
                                    <option value="Technologie">Technologie</option>
                                    <option value="Outils">Outils</option>
                                    <option value="Peluche">Peluche</option>
                                </select>
                                @if ($errors->has('type_de_produit'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type_de_produit') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Modifier cette annonces
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class AnnonceController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $per_page = 6;
    $views = Annonce::orderBy('annonce_id', 'DESC')->paginate($per_page);
    $users = Auth::user();
    return view('/annonce', compact('views', 'users', 'posts'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(Request $request)
  {
    $users = Auth::user();
    if(request('title')) {
      $annonce = Annonce::create([
        'title' => request('title'),
        'description' => request('description'),
        'picture' => request('picture'),
        'price' => request('price'),
        'ville' => request('ville'),
        'type_de_produit' => request('type_de_produit'),
        'user_id' => $users['id'],
      ]);
    }
    return view('home');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Request $request)
  {
    $recherche = $request->input('recherche');
    $ville = request('ville');
    $produit = request('type_de_produit');
    $views = Annonce::all();
    $users = Auth::user();

   if($recherche == "Default" && $ville != "Default" && $produit != "Default") {
      $requetes = Annonce::where('ville', '=', $ville)->get();
      $requetes = $requetes->where('type_de_produit', '=', $produit);
    }

    else if($recherche != "Default" && $ville == "Default" && $produit != "Default") {
      $requetes = Annonce::where('title', 'LIKE', '%' . $recherche . '%')->get();
      $requetes = $requetes->where('type_de_produit', '=', $produit);
    }

    else if($recherche != "Default" && $ville != "Default" && $produit == "Default") {
      $requetes = Annonce::where('title', 'LIKE', '%' . $recherche . '%')->get();
      $requetes = $requetes->where('ville', '=', $ville);
    }

    else if($recherche == "Default" && $ville == "Default" && $produit != "Default")
    $requetes = Annonce::where('type_de_produit', '=', $produit)->get();

    else if($recherche == "Default" && $ville != "Default" && $produit == "Default")
    $requetes = Annonce::where('ville', '=', $ville)->get();

    else if($recherche != "Default" && $ville == "Default" && $produit == "Default")
    $requetes = Annonce::where('title', 'LIKE', '%' . $recherche . '%')->get();

    else {
      $requetes = Annonce::where('title', 'LIKE', '%' . $recherche . '%')->get();
      $requetes = $requetes->where('ville', '=', $ville);
      $requetes = $requetes->where('type_de_produit', '=', $produit);
    }

    return view('/recherche', compact('views', 'users', 'requetes'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Request $request, $id)
  {
    $selection = Annonce::find($id);
    $selection->update($request->all());
    return view('/edit_annonce', compact('selection'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    Annonce::where('annonce_id', $id)->delete();
    $views = Annonce::all();
    $users = Auth::user();
    return view('/annonce', compact('views', 'users'));
  }
}

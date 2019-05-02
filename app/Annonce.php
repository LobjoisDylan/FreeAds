<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Annonce extends Model
{

  protected $primaryKey = 'annonce_id';
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
      'title', 'description', 'picture', 'price', 'user_id', 'type_de_produit', 'ville'
  ];
}

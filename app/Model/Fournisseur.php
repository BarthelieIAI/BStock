<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fournisseur extends Model
{
    use SoftDeletes;
    protected $table = "fournisseur";
    protected $fillable = ['nom', 'prenom', 'tel'];
}
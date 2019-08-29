<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demande extends Model
{
    use SoftDeletes;
    protected  $table = "demande";
    protected  $fillable = ['Libelle','user_id'];
}

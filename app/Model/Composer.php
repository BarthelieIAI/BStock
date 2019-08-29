<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Composer extends Model
{
   use SoftDeletes;
    protected  $table = "composer_de";
    protected  $fillable = ['prod_id','Appro_id','Quantite','Date'];
}

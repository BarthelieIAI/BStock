<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concerner extends Model
{
 use SoftDeletes;
    protected  $table = "concerner";
    protected  $fillable = ['Prod_id','Dem_id','Quantite','Date'];
}

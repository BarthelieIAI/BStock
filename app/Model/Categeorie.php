<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categeorie extends Model
{

  use SoftDeletes;

    protected  $table = "categeorie";
    protected  $fillable = ['libelles','description'];
}

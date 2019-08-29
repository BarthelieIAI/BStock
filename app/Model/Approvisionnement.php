<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approvisionnement extends Model
{
    use SoftDeletes;
    protected  $table = "approvisionnement";
    protected  $fillable = ['nomAppro','four_id','user_id'];
}

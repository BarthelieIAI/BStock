<?php

namespace App\Http\Controllers\Accueil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccueilController extends Controller
{
public function accueil(){
    return view('admin.users.dashboard');
}
}

<?php
//jonas est bien rentré en session
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//JE  VOIS AUSSI JONAS
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*Route::get('/', function () {
    return view('welcome');
});


/**
 * Admin routes
 */


    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*Route::get('/home', 'HomeController@index')->name('home');*/
Auth::routes();

Route::resource('produit', 'Produits\ProduitController');

Route::resource('fournisseur', 'Fournisseurs\FournisseurController');

Route::resource('approvisionnement', 'Approvisionnements\ApprovisionnementController');

Route::resource('personnel', 'Personnels\PersonnelController');

Route:: resource('categorie','Categorie\CategorieController');

Route::resource('groupe','Groupe\GroupeController');

Route::resource('demande','Demande\DemandeController');

Route::resource('concerner','Concerner\ConcernerController');

Route::resource('composer','Composer\ComposerController');

Route::resource('role','Admin\RolesControllers');

Route::resource('permission','Admin\PermissionsControllers');

Route::resource('user','Admin\UserManagementController');


Route::get('assign',function ()
{
    return view('admin.userAjouter');
});
Route::get('assign/role','Admin\UserManagementController@assign')
    ->name('userPermission');

Route::get('donner',function ()
{
    return view('admin.userAssigner');
});
Route::get('/' ,function(){
    return view('admin.users.dashboard');
});
Route::get('donner/users','Admin\UserManagementController@donner')
    ->name('userRole');


Route::get('__construct/authenticate','Admin\UserManegementController@__construct')
    ->name('session');

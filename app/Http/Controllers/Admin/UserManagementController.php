<?php

namespace App\Http\Controllers\Admin;
use App\Forms\PermissionsForm;
use App\Forms\RolesForm;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Middleware\Authenticate;
Class UserManagementController extends Controller
    {

        public function assign(FormBuilder $formBuilder)
            {
                $permissions=DB::table('permissions')
                ->select('name')
                ->get();

                $form= $formBuilder->create(PermissionsForm::class);

                return view('admin.users.Ajouter', [
                    'permissions'=>$permissions,
                    'form' => $form
                ]);
            }

            public function donner(FormBuilder $formBuilder)
            {
                $roles=DB::table('roles')
                    ->select('name')
                    ->get();
                $form=$formBuilder->create(RolesForm::class);
                return view('admin.users.Assigner',[
                    'roles'=>$roles,
                    'form'=>$form
                ]);
            }
            public function demander(FormBuilder $formBuilder){
            $demande=DB::table('Demande')->select('description')->get();
            }
    public function index()
    {
        $users=User::all();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }
    public function __construct(){
            $this->middleware('auth');
}

    }

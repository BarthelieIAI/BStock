<?php

namespace App\Http\Controllers\Admin;

use App\Forms\RolesForm;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;


class RolesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $roles= Role::all();

       return view('admin.roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(RolesForm::class, [
            'method' => 'POST',
            'url' => route('role.store')
        ]);

        return view('admin.roles.create', [
            'form' => $form
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(RolesForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $role = new Role();

        $role->fill($form->getFieldValues());

        $role->save();

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('admin.roles.show',[
                'role'=>$role
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id ,FormBuilder $formBuilder)
    {
        $role = Roles::find($id);
        $data = $role->getAttributes();

        $form = $formBuilder->create(
            RolesForm::class,
            [
                'url' => route('role.update', ['id' => $id]),
                'method' => 'PATCH',
                'model' => $role
            ]);


        return view('admin.roles.edit', [
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormBuilder $formBuilder,$id)
    {

        $form = $formBuilder->create(RolesForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }


        $role=Roles::find($id);


        $role->update($form->getFieldValues());

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $role=Roles::find($id);
        $request->session()->flash('success', 'role supprimé');

        return redirect()
            ->route('role.index');
    }
}

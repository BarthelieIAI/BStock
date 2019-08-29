<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\PermissionsForm;
class PermissionsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission=Permission::all();

        return view('admin.permissions.index', [
            'permission'=>$permission]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PermissionsForm::class, [
            'method' => 'POST',
            'url' => route('permission.store')
        ]);

        return view('admin.permissions.create', [
            'form' => $form
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(PermissionsForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $permission = new Permission();

        $permission->fill($form->getFieldValues());

        $permission->save();

        return redirect()->route('permission.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);

        return view('admin.permissions.show',[
                'permission'=>$permission
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,FormBuilder $formBuilder)
    {
        $permission = Permission::find($id);
        $data = $permission->getAttributes();

        $form = $formBuilder->create(
            PermissionsForm::class,
            [
                'url' => route('permission.update', ['id' => $id]),
                'method' => 'PATCH',
                'model' => $permission
            ]);


        return view('admin.permissions.edit', [
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, $id)
    {
        $form = $formBuilder->create(PermissionsForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }


        $permission=Permission::find($id);


        $permission->update($form->getFieldValues());

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $permission=Permission::find($id);
        $request->session()->flash('success', 'autorisation supprimé');

        return redirect()
            ->route('permission.index');
    }}

<?php

namespace App\Http\Controllers\Groupe;
use App\Forms\GroupeForm;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Model\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groupe::all();

        return view('Groupe.index', [
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form=$formBuilder->create(GroupeForm::class,
            [
                'method'=>'POST',
                'url'=>route('groupe.store')
            ]);
       return view('Groupe.create',[
           'form'=>$form
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
       $form=$formBuilder->create(GroupeForm::class);
       if(!$form->isValid())
       {
           return redirect()
               ->back()
               ->withErrors($form->getErrors())
               ->withInput();
       }
       $groupe= new Groupe();
       $groupe->fill($form->getFieldValues());
       $groupe->save();
       return redirect()->route('groupe.index')->
           with('Groupe créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $groupe=Groupe::find($id);
     return view('Groupe.show',[
         'groupe'=>$groupe
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id,FormBuilder $formBuilder)
    {
        $groupe=Groupe::find($id);

        $data=$groupe->getAttributes();

        $form=$formBuilder->create(
            GroupeForm::class,
            [
                'url'=>route('groupe.update',[
                    'id'=>$id
                ]),
                'method'=>'PATCH',
                'model'=>$groupe
            ]
        );
       return view('Groupe.edit',[
           'form'=>$form
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id,FormBuilder $formBuilder)
    {
     $form=$formBuilder->create(GroupeForm::class);
        if(!$form->isValid())
        {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $groupe=Groupe::find($id);
        $groupe->update($form->getFieldValues());
        return redirect()->route('groupe.index')->
            with('groupe modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id,Request $request)
    {
        $groupe=Groupe::find($id);
        $request->session()->flash('success','groupe supprimé');
       return redirect()->route('groupe.index');
    }
}

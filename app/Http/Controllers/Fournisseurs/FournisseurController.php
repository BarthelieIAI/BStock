<?php

namespace App\Http\Controllers\Fournisseurs;

use App\Model\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forms\FournisseurForm;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;
class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers =Fournisseur::all();

        return view('Fournisseurs.index', [
            'providers' => $providers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form=$formBuilder->create(FournisseurForm::class,[
            'method'=>'POST',
            'url'=>route('fournisseur.store')
        ]);
  return view('Fournisseurs.create',[
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
        $form=$formBuilder->create(FournisseurForm::class);

       if(!$form->isValid()){
           return redirect()
               ->back()
               ->withErrors($form->getErrors())
               ->withInput();

       }

       $four=new Fournisseur();

       $four->fill($form->getFieldValues());

        $four->save();

       return redirect()->route('fournisseur.index')->with('fournisseur enregistré ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $four=Fournisseur::find($id);
       return view('Fournisseurs.show',[
         'four'=>  $four
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( int $id,FormBuilder $formBuilder)
    {
        $four=Fournisseur::find($id);
        $data=$four->getAttributes();
        $form=$formBuilder->create(
            FournisseurForm::class ,
            [
                'url'=>route('fournisseur.update',[
                    'id'=>$id
                ]),
                'method'=>'PATCH',
                'model'=>$four
            ]
        );
       return view('Fournisseurs.edit',[
           'form'=>$form
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id,FormBuilder $formBuilder)
    {
       $form=$formBuilder->create(FournisseurForm::class);
       if(!$form->isValid())
       {
           return redirect()
               ->back()
               ->withErrors($form->getErrors())
               ->withInput();
       }
       $four=Fournisseur::find($id);

       $four->update($form->getFieldValues());

        return redirect()->route('fournisseur.index')->
            with('fournisseur modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id,Request $request
    )
    {
        $four=Fournisseur::find($id);
        $request->session()->flash('success','Fournisseur supprimé');

       return redirect()->route('fournisseur.index')->with('fournisseur supprimé');
    }
}

<?php

namespace App\Http\Controllers\Categorie;

use App\Forms\CategorieForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Categeorie;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categeories = Categeorie::all();

        return view('Categorie.index', [
            'categories' => $categeories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CategorieForm::class, [
            'method' => 'POST',
            'url' => route('categorie.store')
        ]);

       return view('Categorie.create', [
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

        $form = $formBuilder->create(CategorieForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $cat = new Categeorie();

        $cat->fill($form->getFieldValues());

        $cat->save();

       return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categeorie::find($id);

       return view('Categorie.show',[
               'category'=>$category
              ]
       );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id, FormBuilder $formBuilder)
    {

        /** @var Categeorie $category */
        $category = Categeorie::find($id);

        $data = $category->getAttributes();

        $form = $formBuilder->create(
            CategorieForm::class,
            [
                'url' => route('categorie.update', ['id' => $id]),
                'method' => 'PATCH',
                'model' => $category
            ]);


      return view('Categorie.edit', [
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
    public function update(int $id, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CategorieForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        /** @var Categeorie $category */
        $category = Categeorie::find($id);


        $category->update($form->getFieldValues());

       return redirect()->route('categorie.index')->with('categorie modifié ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, Request $request)
    {
        /** @var Categeorie $category */
        $category = Categeorie::find($id);

       $category->delete();
     //$category->trashed();

        $request->session()->flash('success', 'categorie supprimé');

      return redirect()
          ->route('categorie.index');
    }
}

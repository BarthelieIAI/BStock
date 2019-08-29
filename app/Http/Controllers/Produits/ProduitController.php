<?php

namespace App\Http\Controllers\Produits;

use App\Model\Categeorie;
use Illuminate\Support\Facades\DB;
use App\Model\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forms\ProduitForm;
use Kris\LaravelFormBuilder\FormBuilder;
class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('produit')
         ->join('categeorie','produit.cat_id', '=','categeorie.id')
            ->distinct()
     ->select('produit.*', 'categeorie.libelles')
        ->get();
         $i=0;
       for($i;$i<count($products); $i++)
        {
            $products[$i]->etat=($products[$i]->quantite<$products[$i]->qteCritique)? 'critique':'disponible';
        }
//        dd($products);

        return view('Produits.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( FormBuilder $formBuilder)
    {

        $form=$formBuilder->create(ProduitForm::class,[
            'method'=>'POST',
            'url'=>route('produit.store'),
        ]);


        return view('Produits.create',[
            'form'=>$form
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
        dd('store');

        $form=$formBuilder->create(ProduitForm::class);
        if(!$form->isValid())
        {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $produit=new Produit();
        $produit->fill($form->getFieldValues());
        $produit->save();
        return redirect()->Route('produit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit=Produit::find($id);

      return view('Produits.show',[
          'produit'=>$produit
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id ,FormBuilder $formBuilder)
    {

//        dd('edit');

        $produits=Produit::find($id);

        $data=$produits->getAttributes();

        $form=$formBuilder->create(
            ProduitForm::class,
            [
                'url'=>route('produit.update',
                    ['id'=>$id]),
                'method'=>'PATCH',
                'model'=>$produits
            ]);

         return view('Produits.edit',[
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
    public function update(int $id,FormBuilder$formBuilder )
    {
        $form=$formBuilder->create(ProduitForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $produit=Produit::find($id);
        $produit->update($form->getFieldValues());

        return redirect()->route('produit.index')->with('succes','produit modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id,Request $request)
    {

        $produit=Produit::find($id);
        $request->session()->flash('success','Produit supprimé');
        return redirect()->route('produit.index');

    }
}

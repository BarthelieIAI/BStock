<?php

namespace App\Http\Controllers\Demande;
use App\User;
use App\DemandeForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Demande;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Model\Produit;
use App\Model\Concerner;
use Auth;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = DB::table('demande')
        ->join('users','demande.user_id', '=','users.id')
        ->distinct()
        ->select('demande.*', 'users.name')
        ->get();
        return view('Demande.index', [
            'demandes' => $demandes,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Demande.create', ['produits' => Produit::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,FormBuilder $formBuilder)
    {
        //dd($request->all());
        $produits = Produit::all();
        foreach($produits as $produit)
        {
                if ( isset($request->choix[$produit->id]) && $request->choix[$produit->id] == 'on')
                    if($request->qte[$produit->id] == null)
                      return "Error : La qte du produit ". $produit->libelle. " est introvable" ;
        }

      //  dd(Auth::user()->id);

        Demande::create([
            'Libelle' =>  $request->description,
            'user_id' =>  1,
            'user_dmd_id' =>  Auth::user()->id,
        ]);

        $dmd = Demande::all()->last();


        foreach($produits as $produit)
        {
            if ( isset($request->choix[$produit->id]) && $request->choix[$produit->id] == 'on')
                if($request->qte[$produit->id] != null)
                {
                    Concerner::create([
                        'Prod_id' => $produit->id,
                        'Dem_id' => $dmd->id,
                        'Quantite' => $request->qte[$produit->id],
                    ]);
                }
        }

       $cons =  Concerner::where(['Dem_id'  =>  $dmd->id])
                    ->leftJoin('produit', 'concerner.Prod_id' , '=', 'produit.id')
                    ->get();

        return $dmd. '<br/>' . $cons;

       /* dd($request->all());
        $form=$formBuilder->create(DemandeForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();

        }

        $dem=new Demande();

        $dem->fill($form->getFieldValues());

        $dem->save();

        return redirect()->route('demande.index')->with('demande enregistrée ');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dem=Demande::find($id);
        return view('Demande.show',[
            'dem'=>  $dem
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $dem=Demande::find($id);
        $data=$dem>getAttributes();
        $form=$formBuilder->create(
            DemandeForm::class ,
            [
                'url'=>route('demande.update',[
                    'id'=>$id
                ]),
                'method'=>'PATCH',
                'model'=>$dem
            ]
        );
        return view('Demande.edit',[
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
    public function update(FormBuilder $formBuilder, $id)
    {
        $form=$formBuilder->create(DemandeForm::class);
        if(!$form->isValid())
        {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $dem=Fournisseur::find($id);

        $dem->update($form->getFieldValues());

        return redirect()->route('demande.index')->
        with('demande modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}

<?php

namespace App\Http\Controllers\Approvisionnements;

use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\ApprovisionnementForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\Approvisionnement;

class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvisionnements = DB::table('approvisionnement')
        ->join('fournisseur', 'approvisionnement.four_id','=','fournisseur.id')
        ->distinct()
        ->join('users','approvisionnement.user_id','=','users.id')
        ->distinct()
        ->select('approvisionnement.*','fournisseur.nom','users.name')
        ->get();

        return view('Approvisionnements.index', [
            'approvisionnements' => $approvisionnements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ApprovisionnementForm::class, [
            'method' => 'POST',
            'url' => route('approvisionnement.store')
        ]);

       return view('Approvisionnements.create', [
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
        $form = $formBuilder->create(ApprovisionnementForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $appro = new Approvisionnement();

        $appro->fill($form->getFieldValues());

        $appro->save();

        return redirect()->route('approvisionnement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $approvisionnement = Approvisionnement::find($id);

        return view('Approvisionnements.show',[
                'approvisionnement'=>$approvisionnement
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( int $id, FormBuilder $formBuilder)
    {

        $approvisionnement = Approvisionnement::find($id);
        $data = $approvisionnement->getAttributes();

        $form = $formBuilder->create(
            ApprovisionnementForm::class,
            [
                'url' => route('approvisionnement.update', ['id' => $id]),
                'method' => 'PATCH',
                'model' => $approvisionnement
            ]);


        return view('Approvisionnements.edit', [
            'form' => $form
        ]);
;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, int $id)

    {
        $form = $formBuilder->create(ApprovisionnementForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }


        $approvisionnement= Approvisionnement::find($id);


        $approvisionnement->update($form->getFieldValues());

        return redirect()->route('approvisionnement.index')->with('approvisionnement modifié ');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id,Request $request)

    {

        $approvisionnement=Approvisionnement::find($id);
        $request->session()->flash('success', 'Approvisionnement supprimé');

        return redirect()
            ->route('approvisionnement.index');
    }
}

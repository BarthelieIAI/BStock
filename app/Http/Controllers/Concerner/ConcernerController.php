<?php

namespace App\Http\Controllers\Concerner;

use App\ConcernerForm;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Concerner;
use Illuminate\Support\Facades\DB;

class ConcernerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cons = DB::table('concerner')
            ->join('produit','concerner.Prod_id', '=','produit.id')
            ->distinct()
            ->join('demande','concerner.Dem_id','=','demande.id')
            ->distinct()
            ->select('concerner.*', 'produit.libelle','demande.id')
            ->get();


        return view('Concerner.index', [
            'cons' => $cons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ConcernerForm::class, [
            'method' => 'POST',
            'url' => route('concerner.store')
        ]);

        return view('Concerner.create', [
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

        $form = $formBuilder->create(ConcernerForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $cat = new Concerner();

        $cat->fill($form->getFieldValues());

        $cat->save();

        return redirect()->route('concerner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concerner = Conerner::find($id);

        return view('Concerner.show',[
                'concerner'=>$concerner
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
        $concerner = Concerner::find($id);

        $data = $concerner->getAttributes();

        $form = $formBuilder->create(
            ConcernerForm::class,
            [
                'url' => route('concerner.update', ['id' => $id]),
                'method' => 'PATCH',
                'model' => $concerner
            ]);


        return view('Concerner.edit', [
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
    public function update(FormBuilder $formBuilder, $id)
    {
        $form = $formBuilder->create(ConcernerForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $concerner = Concerner::find($id);


        $concerner->update($form->getFieldValues());

        return redirect()->route('concerner.index')->with('modifié ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $concerner = Concerner::find($id);

        $concerner->delete();
        $request->session()->flash('success', ' supprimé');

        return redirect()
            ->route('concerner.index');
    }
}

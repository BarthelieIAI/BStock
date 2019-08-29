<?php

namespace App\Http\Controllers\Composer;

use App\ComposerForm;
use App\Model\Composer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;

class ComposerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $composer =DB::table('composer_de')
        ->join('produit','composer_de.Prod_id', '=','produit.id')
        ->distinct()
        ->join('approvisionnement','composer_de.Appro_id','=','approvisionnement.id')
        ->distinct()
        ->select('composer_de.*', 'produit.libelle','approvisionnement.nomAppro')
        ->get();
        return view('Composer.index', [
            'composer' => $composer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ComposerForm::class, [
            'method' => 'POST',
            'url' => route('composer.store')
        ]);

        return view('composer.create', [
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
        $form = $formBuilder->create(ComposerForm::class);

        if (!$form->isValid())
        {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $cat = new Composer();

        $cat->fill($form->getFieldValues());

        $cat->save();

        return redirect()->route('composer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $composers = Composer::find();

        return view('Composer.show',[
                'composer'=>$composers
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($libelle,FormBuilder $formBuilder)
    {
        $composer = Composer::find($libelle);

        $data = $composer->getAttributes();


        $form = $formBuilder->create(
            ComposerForm::class,
            [
                'url' => route('composer.update', ['libelle' => $libelle]),
                'method' => 'PATCH',
                'model' => $composer
            ]);


        return view('Composer.edit', [
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
    public function update(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ComposerForm::class);

        if (!$form->isValid()) {

            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
            $composer = Composer::find($libelle);
        }

            $composer->update($form->getFieldValues());

            return redirect()->route('composer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($libelle,Request $request)
    {
        $composer = Composer::find($libelle);

        $composer->delete();

        $request->session()->flash('success', ' supprimé');

        return redirect()
            ->route('Composer.index');
    }
}

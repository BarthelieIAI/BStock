<?php

namespace App\Http\Controllers\Personnels;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Forms\PersonnelForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Facades\Hash;
class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = User::all();

        return view('Personnels.index', [
            'personnels' => $personnels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form=$formBuilder->create(PersonnelForm::class,
        [
            'method'=>'POST',
            'url'=>route('personnel.store')
        ]);

   return view('Personnels.create',[
       'form'=>$form
   ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormBuilder $formBuilder ,Request $request)
    {
       $form=$formBuilder->create(PersonnelForm::class);

        if(!$form->isValid())
        {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $personnel = new User();

        $personnel->fill($form->getFieldValues());

       $personnel->fill([
           'password' => Hash::make($form
                                                       ->getField('password')
                                                       ->getRawValue())
       ]);


      $personnel->save();

        return redirect()->route('personnel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personnel=User::find($id);
      return view('Personnels.show',[
          'personnel'=>$personnel
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
        $personnel=User::find($id);
        $data=$personnel->getAttributes();
        $form=$formBuilder->create(
            PersonnelForm::class,[
                'url'=>route('personnel.update',['id'=>$id]),
                'method'=>'PATCH',
                'model'=>$personnel
            ]
        );
        return view('Personnels.edit',[
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
    public function update(int $id,FormBuilder $formBuilder,Request $request)
    {

        $form=$formBuilder->create(PersonnelForm::class);
        if(!$form->isValid())
        {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $pers=User::find($id);
        $pers->update($form->getFieldValues());

       /* $request->user()->fill([
            'password'=>Hash::make($request->newPassword)
        ])->save();*/
        return redirect()->route('personnel.index')->with('personnel modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id,Request $request)
    {
        $personnel=User::find($id);
        $request->session()->flash('success','Personnel supprimé');
       return redirect()->route('personnel.index');
    }
}

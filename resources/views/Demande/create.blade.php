@extends('layouts.template.dashboard')

@section ('page')
    Groupe
@endsection

@section('Description')
    Enregistrer des groupes
@endsection

@section('content')
    <div class ="row">
        <div class="pull-left">
            <h3>Ajouter un nouveau groupe</h3>
        </div>
        <div class="pull-right">
            <a class="btn-btn-primary" href="{{Route('demande.index')}}">Retour</a>
        </div>
    </div>
            <div class = "row justify-content-center" >
                <div class = "col-lg-6 col-sm-9 col-md-8" >
                    {!! form($form) !!}
                    {{--           {!! Form::select('cat_id', $cat, null, ['class' => 'form-control'])!!}--}}
                </div>
            </div>

@endsection
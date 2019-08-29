@extends('layouts.template.dashboard')

@section ('page')
Entrée
@endsection

@section('Description')
    Enregistrer les entrées de stocks
@endsection

@section('content')
    <div class ="row">
        <div class="pull-left">
            <h3>Ajouter une entrée de stock</h3>
        </div>
        <div class="pull-right">
            <a class="btn-btn-primary" href="{{Route('composer.index')}}">Retour</a>
        </div>
    </div>
    <div class = "row justify-content-center" >
        <div class = "col-lg-6 col-sm-9 col-md-8" >
            {!! form($form) !!}
        </div>
    </div>

@endsection
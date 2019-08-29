@extends('layouts.template.dashboard')

@section ('page')
    Personnels
@endsection

@section('Description')
    Enregistrer des Personnels
@endsection

@section('content')
    <div class ="row">
        <div class="pull-left">
            <h3>Ajouter un nouveau produit</h3>
        </div>
        <div class="pull-right">
            <a class="btn-btn-primary" href="{{Route('produit.index')}}">Retour</a>
        </div>
    </div>
    <div class = "row justify-content-center" >
        <div class = "col-lg-6 col-sm-9 col-md-8" >
            {!! form($form) !!}
        </div>
    </div>
@endsection
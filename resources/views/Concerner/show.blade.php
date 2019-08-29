@extends('layouts.template.dashboard')

@section ('page')
   Sortie de stocks
@endsection

@section('Description')
afficher les sorties de produits
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher une sortie de produits </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('concerner.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Produit: </strong>
                {{$concerne->libelle}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Demande: </strong>
                {{$groupe->Libelle}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Quantité: </strong>
                {{$groupe->Quantite}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Date: </strong>
                {{$groupe->Date}}
            </div>
        </div>
    </div>
@endsection
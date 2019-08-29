@extends('layouts.template.dashboard')

@section ('page')
    Produit
@endsection

@section('Description')
    Afficher la liste des produits
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher le produit </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('produit.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Code: </strong>
                {{$produit->id}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Libelle: </strong>
                {{$produit->libelle}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Quantité: </strong>
                {{$produit->quantite}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Categorie: </strong>
                {{$produit->cat_id}}
            </div>
        </div>
    </div>
        @endsection
@extends('layouts.template.dashboard')

@section ('page')
   Fournisseur
@endsection

@section('Description')
    Afficher les fournisseurs
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher un fournisseur </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('fournisseur.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Identifiant: </strong>
                {{$four->id}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Nom: </strong>
                {{$four->nom}}
            </div>
            <div class = "col-xs-12. col-sm-12. col-md-12" >
                <div class = "form-group" >
                    <strong>Prenom: </strong>
                    {{$four->prenom}}
                </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Tel: </strong>
                {{$four->tel}}
            </div>
        </div>
    </div>
@endsection
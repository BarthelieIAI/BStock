@extends('layouts.template.dashboard')

@section ('page')
   Groupes
@endsection

@section('Description')
    Afficher des groupes
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher un groupe de personnel </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('groupe.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Produit: </strong>
                {{$compose->libelle}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Approvisionnement: </strong>
                {{$compose->nomAppro}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Quantité: </strong>
                {{$compose->Quantite}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Date d'entrée: </strong>
                {{$compose->Date}}
            </div>
        </div>
    </div>
@endsection
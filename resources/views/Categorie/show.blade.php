@extends('layouts.template.dashboard')

@section ('page')
   Categorie
@endsection

@section('Description')
    Afficher des categories
@endsection

@extends('layouts.template.dashboard')

@section ('page')
    Categorie
@endsection

@section('Description')
    Afficher la liste des categories
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher une categorie de produits </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{Route('categorie.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Libelle: </strong>
                {{$category->libelles}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Description: </strong>
                {{$category->description}}
            </div>
        </div>
    </div>

@endsection
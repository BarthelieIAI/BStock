@extends('layouts.template.dashboard')

@section ('page')
  Demande
@endsection

@section('Description')
    Afficher une demande
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher une demande</h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('demande.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Code: </strong>
                {{$demande->id}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> Libelle: </strong>
                {{$demande->Libelle}}
            </div>
        </div>
    </div>
@endsection
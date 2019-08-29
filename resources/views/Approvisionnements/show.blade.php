@extends('layouts.template.dashboard')

@section ('page')
    Approvisionnement
@endsection

@section('Description')
    Afficher des approvisionnements
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher un approvisionnement </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('approvisionnement.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Code: </strong>
                {{$approvisionnement->id}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> NomAppro: </strong>
                {{$approvisionnement->nomAppro}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> NomAppro: </strong>
                {{$approvisionnement->nom}}
            </div>
        </div>

    </div>
@endsection
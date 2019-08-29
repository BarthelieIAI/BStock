@extends('layouts.template.dashboard')

@section ('page')
   Personnel
@endsection

@section('Description')
  Afficher les Personnels
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher les personnels </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('personnel.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Identifiant: </strong>
                {{$personnel->id}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Nom: </strong>
                {{$personnel->nom}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> E-mail: </strong>
                {{$personnel->email}}
            </div>
            <div class = "col-xs-12. col-sm-12. col-md-12" >
                <div class = "form-group" >
                    <strong>Tel: </strong>
                    {{$personnel->tel}}
                </div>
            </div>
            <div class = "col-xs-12. col-sm-12. col-md-12" >
                <div class = "form-group" >
                    <strong> Fonction: </strong>
                    {{$personnel->fonction}}
                </div>
        </div>
    </div>
@endsection
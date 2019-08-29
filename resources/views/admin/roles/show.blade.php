@extends('layouts.template.dashboard')

@section ('page')
  Roles
@endsection

@section('Description')
    Afficher des rôles
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher un rôle </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('role.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Code: </strong>
                {{$role->id}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> NomAppro: </strong>
                {{$role->name}}
            </div>
        </div>

    </div>
@endsection
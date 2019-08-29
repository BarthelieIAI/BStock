@extends('layouts.template.dashboard')

@section ('page')
  PERMISSION
@endsection

@section('Description')
    Afficher des permissions
@endsection

@section('content')
    <div class ="row">
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Afficher une permission </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('permission.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong>Code: </strong>
                {{$permisssion->id}}
            </div>
        </div>
        <div class = "col-xs-12. col-sm-12. col-md-12" >
            <div class = "form-group" >
                <strong> NomAppro: </strong>
                {{$permission->name}}
            </div>
        </div>

    </div>
@endsection
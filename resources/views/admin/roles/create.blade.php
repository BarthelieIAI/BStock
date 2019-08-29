@extends('layouts.template.dashboard')

@section ('page')
 Roles
@endsection

@section('Description')
    Enregistrer des roles
@endsection

@section('content')
    <div class ="row">
        <div class="pull-left">
            <h3>Ajouter un nouveau role</h3>
        </div>
    </div>
    <div class="row">
        <div class = "pull-right" >
            <a class = "btn btn-primary" href = "{{ route('role.index') }}"> Retour </a>
        </div>
    </div>
    <div class = "row justify-content-center" >
        <div class = "col-lg-6 col-sm-9 col-md-8" >
            {!! form($form) !!}
        </div>
    </div>
@endsection


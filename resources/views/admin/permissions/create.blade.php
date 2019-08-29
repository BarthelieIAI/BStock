@extends('layouts.template.dashboard')

@section ('page')
 PERMISSION
@endsection

@section('Description')
    Enregistrer des autorisation
@endsection

@section('content')
    <div class ="row">
        <div class="pull-left">
            <h3>Ajouter une nouvelle permission</h3>
        </div>
    </div>
    <div class="row">
        <div class = "pull-right" >
            <a class = "btn btn-primary" href = "{{ route('permission.index') }}"> Retour </a>
        </div>
    </div>
    <div class = "row justify-content-center" >
        <div class = "col-lg-6 col-sm-9 col-md-8" >
            {!! form($form) !!}
        </div>
    </div>

@endsection
@extends('layouts.template.dashboard')

@section ('page')
    Approvisionnement
@endsection

@section('Description')
    Enregistrer des approvisionnements
@endsection

@section('content')
    <div class ="row">
        <div class="pull-left">
            <h3>Ajouter un nouveau approvisionnement</h3>
        </div>
        <div class = "pull-right" >
            <a class = "btn btn-primary" href = "{{ route('approvisionnement.index') }}"> Retour </a>
        </div>
    </div>
    <div class = "row justify-content-center" >
        <div class = "col-lg-6 col-sm-9 col-md-8" >
            {!! form($form) !!}
        </div>
    </div>

@endsection
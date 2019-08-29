@extends('layouts.template.dashboard')

@section ('page')
 Concerner
@endsection

@section('Description')
    Modifier les Concerner
@endsection

@section('content')
    <div class = "row" >
        <div class = "col-lg-12 margin-tb" >
            <div class = "pull-left" >
                <h2> Modifier un concerner </h2>
            </div>
            <div class = "pull-right" >
                <a class = "btn btn-primary" href = "{{ route('concerner.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    @if ($errors->any ())
        <div class = "alert alert-danger" >

            <ul>
                @foreach ($errors-> all () as $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class = "row justify-content-center" >
        <div class = "col-lg-6 col-sm-9 col-md-8" >
            {!! form($form) !!}
        </div>
    </div>
   @endsection
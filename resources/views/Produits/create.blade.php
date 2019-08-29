@extends('layouts.template.dashboard')

@section ('page')
Produit
@endsection
Creer un produit
@section('Description')

@endsection

@section('content')
   <div class ="row">
       <div class="pull-left">
           <h3>Ajouter un nouveau produit</h3>
       </div>
   </div>
   <div class="row">
       <div class = "pull-right" >
           <a class = "btn btn-primary" href = "{{ route('produit.index') }}"> Retour </a>
       </div>
   </div>
   <div class = "row justify-content-center" >
       <div class = "col-lg-6 col-sm-9 col-md-8" >
           {!! form($form) !!}
{{--           {!! Form::select('cat_id', $cat, null, ['class' => 'form-control'])!!}--}}
       </div>
   </div>

@endsection
@extends('layouts.template.dashboard')

@section ('page')
   Concerner
@endsection

@section('Description')
   voir les produits qui sont sorties du stock
@endsection

@section('content')
   <div class="row">
      <div class="col-md-12">
         @if (Session::has('success'))
            <div class="alert alert-success">
               <li>{!! session('success') !!}</li>
            </div>
         @endif
         <div  class="fa-pull-right mb-5">
            <a  class="btn btn-success " href="{{Route('concerner.create')}}" >
                enregistrer une sortie de produits en stock</a>
         </div>
         <table class="table table-hover table-bordered " id="Concerner-table" >

            <thead>
            <th class="th-sm">Produit</th>
            <th class=" th-sm">Demande</th>
            <th class="th-sm">Quantite</th>
            <th class="th-sm">Date</th>
            <th>Action</th>

            </thead>
            <tbody>
            @foreach( $cons as $concerne)
               <tr>
                  <td>{{$concerne->libellle}}</td>
                  <Td>{{$concerne->Libelle}}</Td>
                  <td>{{$concerne->Quantite}}</td>
                   <td>{{$concerne->Date}}</td>
                  <td>
                     <form action="{{Route('concerner.destroy',$concerne->id)}}" method="POST">
                        <a class="btn btn-info" href="{{Route('concerner.show',$concerne->id)}}" >Afficher</a>
                        <a class="btn btn-primary " href="{{Route('concerner.edit',$concerne->id)}}">Modifier</a>
                        @crsf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                     </form>
                  </td>
               </tr>
            </tbody>
            @endforeach
         </table>
      </div>

   </div>
@endsection
@push('extra-script')
<script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#concerner-table').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush

@extends('layouts.template.dashboard')

@section ('page')
  Composer
@endsection

@section('Description')
   voir les produits contenues dans un approvissionnement
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
            <a  class="btn btn-success " href="{{Route('composer.create')}}" >Enregistrer les entrées en stcock</a>
         </div>
         <table class="table table-hover table-bordered" id="Composer-table ">

            <thead>
            <th class="th-sm">Produit</th>
            <th class=" th-sm">Approvisionnement</th>
            <th class="th-sm">Quantité</th>
            <th class="th-sm">Date d'entrée</th>
            <th>Action</th>

            </thead>
            <tbody>
            @foreach($composer as $compose)
               <tr>
                  <td>{{$compose->libelle}}</td>
                  <Td>{{$compose->nomAppro}}</Td>
                  <td>{{$compose->Quantite}}</td>
                   <td>{{$compose->Date}}</td>
                  <td>
                     <form action="{{Route('composer.destroy',$compose->libelle)}}" method="POST">
                        <a class="btn btn-info" href="{{Route('composer.show',$compose->libelle)}}" >Afficher</a>
                        <a class="btn btn-primary " href="{{Route('composer.edit',$compose->libelle)}}">Modifier</a>
                         {{(csrf_field())}}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                     </form>
                  </td>
               </tr>
            @endforeach
            </tbody>
         </table>
      </div>

   </div>
@endsection
@push('extra-script')
   <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.min.js')}}"></script>
   <script>
    $(document).ready(function() {
        $('#composer-table ').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush


@extends('layouts.template.dashboard')

@section ('page')
Demande
@endsection

@section('Description')
Notification
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
               <a  class="btn btn-success " href="{{Route('demande.create')}}" >Ajouter une demande</a>
            </div>
         <table class="table table-hover table-bordered" id="Demande-table" >

            <thead>
            <th class="th-sm">Code</th>
            <th class=" th-sm">Libelle</th>
            <th>Action</th>

            </thead>
            <tbody>
            @foreach($demandes as $demande)
               <tr>
                  <td>{{$demande->id}}</td>
                  <Td>{{$demande->Libelle}}</Td>


                  <td>
                     <form action="{{Route('demande.destroy',$demande->id)}}" method="POST">
                        <a class="btn btn-info" href="{{Route('demande.show',$demande->id)}}" >Afficher</a>
                        <a class="btn btn-primary " href="{{Route('demande.edit',$demande->id)}}">Modifier</a>
                        @crsf
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
        $('#demande-table').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush


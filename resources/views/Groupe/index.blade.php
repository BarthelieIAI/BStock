@extends('layouts.template.dashboard')

@section ('page')
Groupe
@endsection

@section('Description')
   La liste des Groupes
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
               <a  class="btn btn-success " href="{{Route('groupe.create')}}" >Créér un nouveau groupe</a>
            </div>
         </div>
   </div>
         <table class="table table-hover table-bordered" id="Groupe-table" >

            <thead>
            <th class="th-sm">Code</th>
            <th class=" th-sm">Libelle</th>
            <th class="th-sm">Description</th>
            <th>Action</th>

            </thead>
         <tbody>
            @foreach($groups as $groupe)


               <tr>
                  <td>{{$groupe->id}}</td>
                  <Td>{{$groupe->titre}}</Td>
                  <td>{{$groupe->description}}</td>

                  <td>
                     <form action="{{Route('groupe.destroy',$groupe->id)}}" method="POST">
                        <a class="btn btn-info" href="{{Route('groupe.show',$groupe->id)}}" >Afficher</a>
                        <a class="btn btn-primary " href="{{Route('groupe.edit',$groupe->id)}}">Modifier</a>
                        {{(csrf_field())}}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                     </form>
                  </td>
               </tr>

            @endforeach
               </tbody>
         </table>
@endsection
@push('extra-script')
<script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#Groupe-table').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush



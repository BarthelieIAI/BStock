@extends('layouts.template.dashboard')

@section ('page')
    Approvisionnement
@endsection

@section('Description')
   la liste des approvisionnement
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
                    <a  class="btn btn-success " href="{{Route('approvisionnement.create')}}" >
                        Créér un nouveau approvisionnement</a>
                </div>
            </div>
            <table class="table table-hover table-bordered" id="Approvisionnement-table" >

                <thead>
                <th class="th-sm">Code</th>
                <th class=" th-sm">NomAppro</th>
                <th class="th-sm">Fournisseur</th>
                <th class="th-sm">Gestionnaire</th>
                <th>Action</th>

                </thead>
                @foreach($approvisionnements as $approvisionnement)
                    <tbody>

                    <tr>
                        <td>{{$approvisionnement->id}}</td>
                        <Td>{{$approvisionnement->nomAppro}}</Td>
                        <td> {{$approvisionnement->nom}}</td>
                        <td>{{$approvisionnement->name}}</td>
                        <td>
                            <form action="{{Route('approvisionnement.destroy',$approvisionnement->id)}}"
                                  method="POST">
                                <a class="btn btn-info"
                                   href="{{Route('approvisionnement.show',$approvisionnement->id)}}" >Afficher</a>
                                <a class="btn btn-primary "
                                   href="{{Route('approvisionnement.edit',$approvisionnement->id)}}">Modifier</a>
                                {{(csrf_field())}}
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @push('extra-script')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#Approvisionnement-table').DataTable({
                "language": {
                    "url": "/lang/fr.lang"
                }
            });
        });
    </script>
    @endpush

@endsection
@extends('layouts.template.dashboard')

@section ('page')
    Fournisseur
@endsection

@section('Description')
    La liste des fournisseurs
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
            <a  class="btn btn-success " href="{{Route('fournisseur.create')}}" >Enregistrer un nouveau fournisseur</a>
        </div>
        </div>
    </div>
    <table class="table table-hover table-bordered" id="Fournisseur-table" >

        <thead>
        <th class="th-sm">Identifiant</th>
        <th class=" th-sm">Nom</th>
        <th class="th-sm">Prenoms</th>
        <th class="th-sm">Tel</th>
        <th>Action</th>

        </thead>
        <tbody>
        @foreach($providers as $four)

            <tr>
                <td>{{$four->id}}</td>
                <Td>{{$four->nom}}</Td>
                <td>{{$four->prenom}}</td>
                <td>{{$four->tel}}</td>
                <td>
                    <form action="{{Route('fournisseur.destroy',$four->id)}}" method="POST">
                        <a class="btn btn-info" href="{{Route('fournisseur.show',$four->id)}}" >Afficher</a>
                        <a class="btn btn-primary " href="{{Route('fournisseur.edit',$four->id)}}">Modifier</a>
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
        $('#Fournisseur-table').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush



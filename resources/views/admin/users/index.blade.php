@extends('layouts.template.dashboard')

@section ('page')
  Utilisateurs
 @endsection

@section('Description')
    La liste des Utilisateurs
@endsection

@section('content')
   <div class="row">
    <div class="col-md-12">
        <a class="btn-btn-primary" href="{{Route('personnel.index')}}">Retour</a>
        @if($message=Session::get('succès'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
    </div>
    <table class="table table-hover table-bordered" id="user-table">

        <thead>
        <th class="th-sm">Identifiant</th>
        <th class=" th-sm">Nom</th>
        <th clas="th-sm">E-Mail</th>
        <th class="th-sm">Rôles</th>
        <th class="th-sm">Demandes</th>

        </thead>
        <tbody>
        @foreach($users as $user)


            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a  class="btn btn-primary"
                        href="{{route('userRole')}}">Ajouter des rôles
                    </a>
                </td>
                <td>
                    <a class="btn btn-info"
                       href="{{route('demande.index')}}"> Voir les demandes
                    </a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    </div>
@endsection
@push('extra-script')
<script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush

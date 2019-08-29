@extends('layouts.template.dashboard')

@section('page')
    Personnel
@endsection

@section('description')
    La liste des personnels
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
                    <a  class="btn btn-success " href="{{Route('personnel.create')}}" >Créér un nouveau personnel</a>
                </div>
        </div>
    </div>

            <table class="table table-hover table-bordered" id="Personnel-table">

                <thead>
                <th class="th-sm">Identifiant</th>
                <th class=" th-sm">Nom</th>
                <th class="th-sm">Telephone</th>
                <th class="th-sm">E-Mail</th>
                <th class="th-sm">Fonction</th>
                <th>Action</th>

                </thead>
                <tbody>
                @foreach($personnels as $pers)


                    <tr>
                        <td>{{$pers->id}}</td>
                        <Td>{{$pers->name}}</Td>
                        <td>{{$pers->tel}}</td>
                        <td>{{$pers->email}}</td>
                        <td>{{$pers->fonction}}</td>
                        <td>
                            <form action="{{Route('personnel.destroy',$pers->id)}}" method="POST">
                                <a class="btn btn-info" href="{{Route('personnel.show',$pers->id)}}" >Afficher</a>
                                <a class="btn btn-primary " href="{{Route('personnel.edit',$pers->id)}}">Modifier</a>
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
        $('#Personnel-table').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush

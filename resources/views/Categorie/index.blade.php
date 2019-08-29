@extends('layouts.template.dashboard')

@section('page')
    Categorie
@endsection

@section('description')
   La liste des categories
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
                <a  class="btn btn-success " href="{{Route('categorie.create')}}" >Créér une nouvelle categorie</a>
            </div>
        </div>
    </div>

    <table class="table table-hover table-bordered" id="categories-table">
        <thead>
            <th class="th-sm">Code</th>
            <th class=" th-sm">Libelle</th>
            <th class="tn-sm">Description</th>
            <th class="tn-sm">Action</th>
        </thead>

        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->libelles}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <form action="{{Route('categorie.destroy',$category->id)}}" method="POST">
                        <a class="btn btn-info" href="{{Route('categorie.show',$category->id)}}" >Afficher</a>
                        <a class="btn btn-primary " href="{{Route('categorie.edit',$category->id)}}">Modifier</a>
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
        $('#categories-table').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush



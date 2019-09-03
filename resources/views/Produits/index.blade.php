@extends('layouts.template.dashboard')

@section('page')
    Produits
@endsection

@section('description')
    la liste des produits
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
                <a  class="btn btn-success " href="{{Route('produit.create')}}" >Créér un nouveau produit</a>
            </div>
        </div>
    </div>
        <table class="table table-hover table-bordered" id="Produit-table" >

                            <thead>
                            <th class="th-sm">Code</th>
                            <th class=" th-sm">Libelle</th>
                            <th class="th-sm">Quantité</th>
                            <th class="th-sm">categorie</th>
                            <th class="th-sm">Etat</th>
                            <th>Action</th>

                            </thead>
                            <tbody>
                            @foreach($products as $produit)
                                <tr>
                                    <td>{{$produit->id}}</td>
                                    <Td>{{$produit->libelle}}</Td>
                                    <td>{{$produit->quantite}}</td>
                                    <td>
                        <a href="{{route('categorie.show',$produit->cat_id)}}">{{$produit->libelles}}</a>
                    </td>
                    <td class="btn {{($produit->etat=='critique')? 'btn-danger':'btn-success'}}" style="color:white;">
                        {{$produit->etat}}</td>
                    <td>
                        <form action="{{Route('produit.destroy',$produit->id)}}" method="POST">
                            <a class="btn btn-info" href="{{Route('produit.show',$produit->id)}}" >Afficher</a>
                            <a class="btn btn-primary " href="{{Route('produit.edit',$produit->id)}}">Modifier</a>
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
        $('#Produit-table').DataTable({
            "language": {
                "url": "/lang/fr.lang"
            }
        });
    });
</script>
@endpush

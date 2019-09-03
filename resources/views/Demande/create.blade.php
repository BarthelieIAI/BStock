@extends('layouts.template.dashboard')

@section ('page')
    Groupe
@endsection

@section('Description')
    Enregistrer des groupes
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
            <a class="btn-btn-primary" href="{{Route('demande.index')}}">Retour</a>
        </div>
    </div>
            <div class = "row justify-content-center" >
                <div class = "col-lg-6 col-sm-9 col-md-8" >
                    <form action="/demande" method="post">
                        {{csrf_field()}}
                        <div  class="mb-100">
                            <label class="">Description</label>
                            <textarea name="description"  class="form-control"></textarea>
                        </div>

                    <table class="table table-hover table-bordered" id="demande-table" >

                        <thead>
                        <th class="th-sm">Choix</th>
                        <th class=" th-sm">Libelle</th>
                        <th class="th-sm">Quantité</th>
                        </thead>
                        <tbody>
                        @foreach($produits as $produit)
                            <tr>
                                <td><input type="checkbox" name="choix[{{$produit->id}}]" /></td>
                                <Td>{{ $produit->libelle }}</Td>
                                <td><input type="text" name="qte[{{$produit->id}}]" /></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        <input type="submit" value="Envoyer" />
                    </form>
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



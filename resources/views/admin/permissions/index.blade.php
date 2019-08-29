@extends('layouts.template.dashboard')

@section ('page')
   PERMISSIONS
@endsection

@section('Description')
    La liste des Permisssions
@endsection

@section('content')
    <label >Search:<input type="search"
                          class="form-control form-control-sm"
                          placeholder=""
                          aria-controls="sampleTable" align="right">
    </label>
    <div >
        <a  class="btn btn-success " href="{{Route('permission.create')}}" >
            Créér une nouvelle permission</a>
    </div>

    @if($message=Session::get('succès'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        </div>
        <table class="table table-hover table-bordered" >

            <thead>
            <th class="th-sm">Code</th>
            <th class=" th-sm">Nom</th>
            <th>Action</th>

            </thead>
            @foreach($permission as $per)
                <tbody>

                <tr>
                    <td>{{$per->id}}</td>
                    <Td>{{$per->name}}</Td>

                    <td>
                        <form action="{{Route('permission.destroy',$per->id)}}"
                              method="POST">
                            <a class="btn btn-info"
                               href="{{Route('permission.show',$per->id)}}" >Afficher</a>
                            <a class="btn btn-primary "
                               href="{{Route('permission.edit',$per->id)}}">Modifier</a>
                            {{(csrf_field())}}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>

@endsection

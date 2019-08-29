@extends('layouts.template.dashboard')

@section ('page')
ROLES
@endsection

@section('Description')
    La liste des rôles
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">


                <label >Search:<input type="search"
                                      class="form-control form-control-sm"
                                      placeholder=""
                                      aria-controls="sampleTable" align="right">
                </label>
                <div >
                    <a  class="btn btn-success " href="{{Route('role.create')}}" >
                        Créér un nouveau role</a>
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
                <th clas="th-sm">Ajouter une permission</th>
                <th>Action</th>

                </thead>
                @foreach($roles as $role)
                    <tbody>

                    <tr>
                        <td>{{$role->id}}</td>
                        <Td>{{$role->name}}</Td>
                        <td><a  class="btn btn-primary"
                        href="{{route('userPermission')}}">Ajouter des permissions</a></td>
                        <td>
                            <form action="{{Route('role.destroy',$role->id)}}"
                                  method="POST">
                                <a class="btn btn-info"
                                   href="{{Route('role.show',$role->id)}}" >Afficher</a>
                                <a class="btn btn-primary "
                                   href="{{Route('role.edit',$role->id)}}">Modifier</a>
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
    @endsection
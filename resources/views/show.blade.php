@extends('layouts.app')

@section('header')
    <h1>{{$header}}</h1>
@endsection

@section('content')
    @isset($company)
        <table class="table text-center table-striped">
            <tbody class="row">
                <tr>
                    <th>Nombre</th>
                    <td>{{$company->name}}</td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td>{{$company->phone}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$company->contact_email}}</td>
                </tr>
                <tr>
                    <th>Direccion</th>
                    <td>{{$company->address}}</td>
                </tr>
                <tr>
                    <th>CIF</th>
                    <td>{{$company->cif}}</td>
                </tr>
                <tr>
                    <td>
                        <a href="{{route('company.edit', $company->id)}}" class="link-info">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('company.destroy', $company->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Borrar" class="btn btn-info"/>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">
                        <a href="{{route('company.index')}}"><h2 style="font-size: 20px;">Volver al indice</h2></a>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset
    @isset($action)
        <table class="table text-center table-striped">
            <tbody class="row">
                <tr>
                    <th>Descripcion</th>
                    <td>{{$action->description}}</td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <td>{{$action->date}}</td>
                </tr>
                <tr>
                    <th>Intervalo</th>
                    <td>{{$action->interval}}</td>
                </tr>
                <tr>
                    <td>
                        <a href="{{route('action.edit', $action->id)}}" class="link-info">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('action.destroy', $action->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Borrar" class="btn btn-info"/>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">
                        <a href="{{route('action.index')}}"><h2 style="font-size: 20px;">Volver al indice</h2></a>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset
    @isset($user)
        <table class="table text-center">
            <tbody class="row">
            <tr>
                <th>Nombre</th>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Telefono</th>
                <td>{{$user->phone}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>Apellido1</th>
                <td>{{$user->surname1}}</td>
            </tr>
            <tr>
                <th>Apellido2</th>
                <td>{{$user->surname2}}</td>
            </tr>
            <tr>
                <th>Tutor</th>
                <td>
                    @if($user->tutor_id && $user->tutor()->where("id",$user->tutor_id)->first() !== null)
                        <a href="{{route('user.show', $user->tutor_id ?? '-')}}" class="link-info">{{$user->tutor()->where("id",$user->tutor_id)->first()->name}}</a>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Profesor</th>
                <td>
                    @if($user->teacher_id && $user->teacher()->where("id",$user->teacher_id)->first() !== null)
                        <a href="{{route('user.show', $user->teacher_id ?? '-')}}" class="link-info">{{$user->teacher()->where("id",$user->teacher_id)->first()->name}}</a>
                    @endif
                </td>           
             </tr>
            <tr>
                <th>Rol</th>
                <td>
                    @if($user->role()->where("user_id",$user->id)->first() !== null)
                        {{$user->role()->where("user_id",$user->id)->first()->name}}
                    @endif
                </td>
            </tr>
            <tr>
                <th>Empresa</th>
                <td>
                    @if($user->company()->where("user_id",$user->company_id)->first() !== null)
                        {{$user->company()->where("user_id",$user->company_id)->first()->name}}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                <a href="{{route('user.edit', $user->id)}}" class="link-info">Editar</a>
                </td>
                <td>
                    <form action="{{route('user.destroy', $user->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Borrar" class="btn btn-info"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="2" rowspan="2">
                    <a href="{{route('user.index')}}"><h2 style="font-size: 20px;">Volver al indice</h2></a>
                </td>
            </tr>
            </tbody>
        </table>
    @endisset
    @isset($rol)
        <table class="table text-center">
            <tbody class="row">
                <tr>
                    <th>Nombre</th>
                    <td>{{$rol->name}}</td>
                </tr>
                <tr>
                    <th>Descripcion</th>
                    <td>{{$rol->description}}</td>
                </tr>
                <tr>
                    <td>
                        <a href="{{route('role.edit', $rol->id)}}" class="link-info">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('role.destroy', $rol->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Borrar" class="btn btn-info"/>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">
                        <a href="{{route('role.index')}}"><h2 style="font-size: 20px;">Volver al indice</h2></a>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset
@endsection
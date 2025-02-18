@extends('layouts.app')

@section('header')
    <h1>{{$header}}</h1>
@endsection

@section('content')
    @isset($company)
        <table class="table text-center">
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
            </tbody>
        </table>
    @endisset
    @isset($action)

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
                    <a href="{{route('user.show', $user->tutor_id ?? '')}}" class="link-info">{{$user->tutor()->where("id",$user->tutor_id)->first()->name ?? '-'}}</a>
                </td>
            </tr>
            <tr>
                <th>Profesor</th>
                <td>
                    <a href="{{route('user.show', $user->teacher_id ?? '')}}" class="link-info">{{$user->teacher()->where("id",$user->teacher_id)->first()->name ?? '-'}}</a>
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
            </tbody>
        </table>
    @endisset
@endsection
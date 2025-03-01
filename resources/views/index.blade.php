@extends('layouts.app')

@section('header')
    <h1>{{$header}}</h1>
    @switch($header)
        @case(str_contains($header, "Empresas"))
            <a href="{{route('company.create')}}">Nueva Empresa</a>
            @break
        @case(str_contains($header, "Acciones"))
            <a href="{{route('action.create')}}">Nueva Accion</a>
            @break
        @case(str_contains($header, "Usuarios"))
            <a href="{{route('user.create')}}">Nuevo Usuario</a>
            @break
        @default
            {{"uwu"}}
    @endswitch
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            @isset($companies)
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Direccion</th>
                                <th>CIF</th>
                                <th colspan="2">Operaciones de tabla</th>
                            @endisset
                            @isset($actions)
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Intervalo</th>
                                <th>Usuario</th>
                                <th colspan="2">Operaciones de tabla</th>
                            @endisset
                            @isset($users)
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Apellido1</th>
                                <th>Apellido2</th>
                                <th>Tutor</th>
                                <th>Profesor</th>
                                <th colspan="2">Operaciones de tabla</th>
                            @endisset
                        </tr>
                    </thead>
                    <tbody>
                        @isset($companies)
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->phone}}</td>
                                    <td>{{$company->contact_email}}</td>
                                    <td>{{$company->address}}</td>
                                    <td>{{$company->cif}}</td>
                                    <td>
                                        <a href="{{route('company.show', $company->id)}}" class="link-info">Ver</a>
                                    </td>
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
                            @endforeach
                        @endisset
                        @isset($actions)
                            @foreach ($actions as $action)
                            <tr>
                                <td>{{$action->description}}</td>
                                <td>{{$action->date}}</td>
                                <td>{{$action->interval}}</td>
                                <td>{{$action->user->name}}</td>
                                <td>
                                    <a href="{{route('action.show', $action->id)}}" class="link-info">Ver</a>
                                </td>
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
                            @endforeach
                        @endisset
                        @isset($users)
                            @foreach ($users as $user)
                            <tr>  
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->surname1}}</td>
                                <td>{{$user->surname2}}</td>
                                <td>
                                    @if($user->tutor_id && $user->tutor()->where("id",$user->tutor_id)->first() !== null)
                                            {{$user->tutor()->where('id',$user->tutor_id)->first()->name}}
                                    @endif
                                </td>
                                <td>
                                    @if($user->teacher_id && $user->teacher()->where("id",$user->teacher_id)->first() !== null)
                                            {{$user->teacher()->where('id',$user->teacher_id)->first()->name}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.show', $user->id)}}" class="link-info">Ver</a>
                                </td>
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
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 


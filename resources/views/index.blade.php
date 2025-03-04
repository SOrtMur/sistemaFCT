@extends('layouts.app')

@section('header')
    <h1>{{$header ?? $header="Bienvenido a la aplicación."}}</h1>
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
        @case(str_contains($header, "Roles"))
            <a href="{{route('role.create')}}">Nuevo Rol</a>  
            @break
    @endswitch
@endsection

@section('content')
    <div class="container mx-auto">
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
                                <th colspan="3">Operaciones de tabla</th>
                            @endisset
                            @isset($actions)
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Intervalo</th>
                                <th>Usuario</th>
                                <th colspan="3">Operaciones de tabla</th>
                            @endisset
                            @isset($users)
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Apellido1</th>
                                <th>Apellido2</th>
                                <th>Tutor</th>
                                <th>Profesor</th>
                                <th>Empresa</th>
                                <th>Rol</th>
                                <th colspan="3">Operaciones de tabla</th>
                            @endisset
                            @isset($roles)
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th colspan="3">Operaciones de tabla</th>
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
                            @php
                                $total = 0;
                            @endphp
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
                            @php
                                $total += $action->interval;
                            @endphp
                            @endforeach
                            <tr class="text-center" style="background-color: #9e9e9e;">
                                <td colspan="7">Total tiempo empleado: {{ $total }} horas.</td>
                            </tr>
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
                                    @if($user->company()->where("user_id",$user->id)->first() !== null)
                                            {{$user->company()->where('user_id',$user->id)->first()->name}}
                                    @endif
                                </td>  
                                <td>
                                    @if($user->role()->where("user_id",$user->id)->first() !== null)
                                            {{$user->role()->where('user_id',$user->id)->first()->name}}
                                    @else
                                            Sin rol
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
                        @isset($roles)
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->description}}</td>
                                <td>
                                    <a href="{{route('role.show', $role->id)}}" class="link-info">Ver</a>
                                </td>
                                <td>
                                    <a href="{{route('role.edit', $role->id)}}" class="link-info">Editar</a>
                                </td>
                                <td>
                                    <form action="{{route('role.destroy', $role->id)}}" method="POST">
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
                @if (str_contains($header, "Bienvenido"))
                    <div class="jumbotron text-center pt-6">
                        <div>
                            <p>Esta es la página principal de la aplicación.</p>
                            <p>Utilice el menú de navegación para acceder a las diferentes secciones.</p>
                            <p>Puede gestionar empresas, acciones, usuarios y roles desde aquí.</p>
                            <p>Para cualquier consulta, no dude en ponerse en contacto con el soporte técnico.</p>
                            @isset($mensaje)
                                <p>{{$mensaje}}</p>
                            @endisset
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection 


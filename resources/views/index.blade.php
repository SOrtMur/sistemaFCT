@extends('layouts.app')

@section('header')
    <h1>{{$header}}</h1>
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
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Direccion</th>
                                <th>CIF</th>
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
                            @foreach ($companies as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$company->phone}}</td>
                                <td>{{$company->contact_email}}</td>
                                <td>{{$company->address}}</td>
                                <td>{{$company->cif}}</td>
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
                        @isset($users)
                            @foreach ($users as $user)
                            <tr>
                                @php
                                    $tutor_name = $user->tutor()->where('id',$user->tutor_id)->first()->name ?? '-';
                                    $teacher_name = $user->teacher()->where('id',$user->teacher_id)->first()->name ?? '-';
                                @endphp
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->surname1}}</td>
                                <td>{{$user->surname2}}</td>
                                <td>{{$tutor_name}}</td>
                                <td>{{$teacher_name}}</td>
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


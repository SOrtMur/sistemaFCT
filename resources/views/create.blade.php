@extends('layouts.app')

@section('header')
    <h1>{{$header}}</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @switch($header)
                    @case(str_contains($header, "Empresa"))    
                        <h2>Nueva empresa</h2>
                        <form action="{{route('company.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" placeholder="Nombre" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="cif">CIF</label>
                                <input type="text" class="form-control" name="cif" placeholder="cif" id="cif" required>
                            </div>
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" class="form-control" name="mail" placeholder="Email" id="mail" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Direccion</label>
                                <input type="text" class="form-control" name="address" placeholder="Direccion" id="address" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefono</label>
                                <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone" required>
                            </div>
                            <div class="form-group">    
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('company.index')}}">Volver al Indice</a>
                            </div>
                        </form>
                        @break
                    @case(str_contains($header, "Acción"))
                        <h2>Nueva accion</h2>
                        <form action="{{route('action.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <input type="text" class="form-control" name="description" placeholder="Descripcion" id="description" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="date" class="form-control" name="date" id="date" required>
                            </div>
                            <div class="form-group">
                                <label for="interval">Intervalo</label>
                                <input type="text" class="form-control" name="interval" placeholder="Intervalo" id="interval" required>
                            </div>
                            <div class="form-group">    
                                <input type="submit" class="btn btn-primary" value="Guardar"/>
                                <a href="{{route('action.index')}}">Volver al Indice</a>
                            </div>
                        </form>
                        @break
                    @case(str_contains($header, "Usuario"))
                        <h2>Nuevo usuario</h2>
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" placeholder="Nombre" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Contraseña</label>
                                <input type="password" class="form-control" name="password" placeholder="Contraseña" id="pass" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefono</label>
                                <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" id="mail" required>
                            </div>
                            <div class="form-group">
                                <label for="surname1">Apellido1</label>
                                <input type="text" class="form-control" name="surname1" placeholder="Apellido1" id="surname1" required>
                            </div>
                            <div class="form-group">
                                <label for="surname2">Apellido2</label>
                                <input type="text" class="form-control" name="surname2" placeholder="Apellido2" id="surname2">
                            </div>
                            <div class="form-group">
                                <label for="tutor">Tutor</label>
                                <select name="tutor_id" id="tutor">
                                    <option value="" selected>---</option>
                                    @foreach ($tutores as $tutor)
                                        <option value="{{$tutor->id}}">{{$tutor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="teacher">Profesor</label>
                                <select name="teacher_id" id="teacher" required>
                                    <option value="" selected>---</option>
                                    @foreach ($profesores as $profesor)
                                        <option value="{{$profesor->id}}">{{$profesor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">    
                                <input type="submit" class="btn btn-primary" value="Guardar"/>
                                <a href="{{route('user.index')}}">Volver al Indice</a>
                            </div>
                        </form>
                        @break
                    @case(str_contains($header, "Rol"))
                        <h2>Nuevo rol</h2>
                        <form action="{{route('role.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" placeholder="Nombre" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <input type="text" class="form-control" name="description" placeholder="Descripcion" id="description" required>
                            </div>
                            <div class="form-group">    
                                <input type="submit" class="btn btn-primary" value="Guardar"/>
                                <a href="{{route('role.index')}}">Volver al Indice</a>
                            </div>
                        </form>
                        @break
                @endswitch
            </div>
        </div>
    </div>
@endsection

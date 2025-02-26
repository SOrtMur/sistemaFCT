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
                    @case(str_contains($header, "Accion"))
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
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
                                <label for="phone">Telefono</label>
                                <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" class="form-control" name="mail" placeholder="Email" id="mail" required>
                            </div>
                            <div class="form-group">
                                <label for="surname1">Apellido1</label>
                                <input type="text" class="form-control" name="surname1" placeholder="Apellido1" id="surname1" required>
                            </div>
                            <div class="form-group">
                                <label for="surname2">Apellido2</label>
                                <input type="text" class="form-control" name="surname2" placeholder="Apellido2" id="surname2" required>
                            </div>
                            <div class="form-group">
                                <label for="tutor">Tutor</label>{{-- Select de los tutores y teachers, modificar el controlador para que devuelva array con estos.--}}
                                <input type="text" class="form-control" name="tutor" placeholder="Tutor" id="tutor" required>
                            </div>
                    @default
                        
                @endswitch
            </div>
        </div>
    </div>
@endsection

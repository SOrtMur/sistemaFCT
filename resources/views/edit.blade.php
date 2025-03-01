@extends('layouts.app')

@section('header')
    <h1>{{$header}}</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @isset($company)
                <form action="{{route('company.update',$company->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre" id="name" value="{{$company->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="cif">CIF</label>
                        <input type="text" class="form-control" name="cif" placeholder="cif" id="cif" value="{{$company->cif}}" required>
                    </div>
                    <div class="form-group">
                        <label for="mail">Email</label>
                        <input type="email" class="form-control" name="contact_email" placeholder="Email" id="mail" value="{{$company->contact_email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" name="address" placeholder="Direccion" id="address" value="{{$company->address}}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone" value="{{$company->phone}}" required>
                    </div>
                    <div class="form-group">    
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route('company.index')}}">Volver al Indice</a>
                    </div>
                </form>
            @endisset
            @isset($action)    
                <form action="{{route('action.update',$action->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" name="description" placeholder="Descripcion" id="description" value="{{$action->description}}" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{$action->date}}" required>
                    </div>
                    <div class="form-group">
                        <label for="interval">Intervalo</label>
                        <input type="text" class="form-control" name="interval" placeholder="Intervalo" id="interval" value="{{$action->interval}}" required>
                    </div>
                    <div class="form-group">    
                        <input type="submit" class="btn btn-primary" value="Guardar"/>
                        <a href="{{route('action.index')}}">Volver al Indice</a>
                    </div>
                </form>
            @endisset
            @isset($user)
                <form action="{{route('user.update',$user->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre" id="name" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone" value="{{$user->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label for="mail">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" id="mail" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="surname1">Apellido1</label>
                        <input type="text" class="form-control" name="surname1" placeholder="Apellido1" id="surname1" value="{{$user->surname1}}" required>
                    </div>
                    <div class="form-group">
                        <label for="surname2">Apellido2</label>
                        <input type="text" class="form-control" name="surname2" placeholder="Apellido2" id="surname2" value="{{$user->surname2 ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="tutor">Tutor</label>
                        <select name="tutor_id" id="tutor">
                            @foreach ($tutores as $tutor)
                                @if ($tutor->id == $user->tutor_id)
                                    <option value="{{$tutor->id}}" selected>{{$tutor->name}}</option>
                                @else
                                    <option value="{{$tutor->id}}">{{$tutor->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="teacher">Profesor</label>
                        <select name="teacher_id" id="teacher" required>
                            <option value="" selected>---</option>
                            @foreach ($profesores as $profesor)
                                @if ($profesor->id == $user->teacher_id)
                                    <option value="{{$profesor->id}}" selected>{{$profesor->name}}</option>
                                @else
                                    <option value="{{$profesor->id}}">{{$profesor->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">    
                        <input type="submit" class="btn btn-primary" value="Guardar"/>
                        <a href="{{route('user.index')}}">Volver al Indice</a>
                    </div>
                </form>
            @endisset
            @isset($rol)
                <form action="{{route('role.update',$rol->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre" id="name" value="{{$rol->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" name="description" placeholder="Descripcion" id="description" value="{{$rol->description}}" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar"/>
                        <a href="{{route('role.index')}}">Volver al Indice</a>
                    </div>
                </form>
            @endisset
        </div>
    </div>
</div>

@endsection

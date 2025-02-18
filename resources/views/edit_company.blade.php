@extends('layouts.app')

@section('header')
    <h1>Nueva empresas</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Nueva empresa</h1>
                <form action="{{route('company.update', $company->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre" id="name" required value="{{$company->name}}">
                    </div>
                    <div class="form-group">
                        <label for="cif">CIF</label>
                        <input type="text" class="form-control" name="cif" placeholder="cif" id="cif" required value="{{$company->cif}}">
                    </div>
                    <div class="form-group">
                        <label for="mail">Email</label>
                        <input type="email" class="form-control" name="mail" placeholder="Email" id="mail" required value="{{$company->contact_email}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" name="address" placeholder="Direccion" id="address" required value="{{$company->address}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone" required value="{{$company->phone}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

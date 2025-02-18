@extends('layouts.app')

@section('header')
    <h1>Nueva empresas</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Nueva empresa</h1>
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

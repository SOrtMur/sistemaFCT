@extends('layouts.master')

@section('titulo','Insertar')

@section('h1','Insertar disco')

@section('discos')
    <form action="{{route('disk.store')}}" method="POST">
        @csrf
        @if ($errors->any()){
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        }
        @endif
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{old('name')}}">
        <label for="artist">Artista:</label>
        <input type="text" name="artist" id="artist" value="{{old('artist')}}">
        <label for="year">Año:</label>
        <input type="number" name="year" id="year" value="{{old('year')}}">
        <label for="genre">Género:</label>
        <input type="text" name="genre" id="genre" value="{{old('genre')}}">
        <input type="submit" value="Insertar">
    </form>
@endsection

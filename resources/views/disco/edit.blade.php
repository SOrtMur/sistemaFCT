@extends('layouts.master')

@section('titulo','Editar')

@section('h1','Editar disco '.$disco->name)

@section('discos')
    <form action="{{route('disk.update',$disco->id)}}" method="post">
        @csrf
        @method('put')
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
        @endif
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{$disco->name}}">
        <label for="artist">Artista:</label>
        <input type="text" name="artist" id="artist" value="{{$disco->artist}}">
        <label for="year">Año:</label>
        <input type="number" name="year" id="year" value="{{$disco->year}}">
        <label for="genre">Género:</label>
        <input type="text" name="genre" id="genre" value="{{$disco->genre}}">
        <input type="submit" value="Insertar">
    </form>
@endsection

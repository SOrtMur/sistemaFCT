@extends('layouts.master')

@section('titulo','Discos')

@section('h1','Bienvenido al listado de discos')

@section('discos')
    <ul>
        @foreach($discos as $disco)
            <li><a href="disco/{{$disco->id}}">{{$disco->name}} - {{$disco->artist}}</a></li>
        @endforeach
    </ul>
@endsection

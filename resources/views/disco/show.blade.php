@extends('layouts.master')

@section('titulo','Disco')

@section('h1','Disco '.$disco->name)

@section('discos')
    <li>{{$disco->name}} - {{$disco->artist}} - </li>
    <form action="{{route ('disk.destroy',$disco->id)}}" method="post" onsubmit="confirmar(event)">
        @csrf
        @method('delete')
        <button type="submit" id="deleteButton">Borrar</button>
    </form><br>
    <script>
        function confirmar(e){
            if(confirm('¿Estás seguro?')){
                return true;
            }else{
                e.preventDefault();
            }
        }
    </script>
@endsection

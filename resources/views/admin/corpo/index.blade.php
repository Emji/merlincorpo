@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
    <h4 class="text-center">Texte corporate et prix</h4>

    <a href="{{route('textcorpo.create')}}"> 
        <button class="btn btn-success">Ecrire texte</button>
    </a>

    <div class="container mt-3 bg-light">

        @foreach ($corpotexts as $corpotext)

        <div class="row m-2">
            <div class="col-8">
            <p class="text-justify text-center">{{$corpotext->texte_corpo}}</p>
            </div>
            <div class="col-2">
                <p class="text-justify text-center">{{$corpotext->prix_session}}</p>
            </div>
            <div class="col-2">
                <div class="row">
                <a href="{{route('textcorpo.edit',['textcorpo'=>$corpotext->id])}}"><button class="btn btn-warning">Edit</button></a>
                <form action="{{route('textcorpo.destroy',['textcorpo'=>$corpotext->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </div>
            </div>
        </div>
            
        @endforeach
    </div>
@stop
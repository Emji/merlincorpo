@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="mt-3">Testimonies</h1>
@stop

@section('content')
    

    <a href="{{route('temoignage.create')}}" class="mt-3"><button class="btn btn-success"> soumettre témoignage</button></a>
    <div class="container bg-light mt-5">

        @foreach ($testimoniess as $testimonies)
            
    
        <div class="row">
            <div class="col-3 d-flex align-items-center">
                <span>{{$testimonies->testimonies}}</span>
            </div>
            <div class="col-3 d-flex align-items-center">
                <span>{{$testimonies->author}}</span>
            </div>
            <div class="col-3">
                <div class="row">
                <a href="{{route('temoignage.edit',['temoignage'=>$testimonies->id])}}">
                    <button class="btn btn-warning">edit</button>
                    </a>
                    <form action="{{route('temoignage.destroy',['temoignage'=>$testimonies->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                    <button class="btn btn-danger">delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop
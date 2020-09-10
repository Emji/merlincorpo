@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h4 class="text-center">Heures disponibles</h4>

    <div class="bg-light mt-3 p-3">
    @foreach ($heures as $heure)
        
    
    <div class="row mt-3">
        <div class="col-3">
        <span>{{$heure->heure}}</span>
        </div>
        <div class="col-3">
                @if($heure->taken)
                <span> Heure réservée</span>
                @else
                <span> Heure libre</span>
                @endif

        </div>
        <div class="col-3">
        <form action="{{route('heures.update',["heure"=>$heure->id])}}" method="post">
                @method('PUT')
                @csrf

                @if($heure->taken)
                <button class="btn btn-success">débloquer l'heure</button>
                @else
                <button class="btn btn-danger">bloquer l'heure</button>
                @endif
            </form>
        </div>
        <div class="col-3"></div>
    </div>
    @endforeach
    </div>
@stop
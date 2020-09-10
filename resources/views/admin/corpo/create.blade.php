@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   <div class="container bg-light mt-5">

   <form action="{{route('textcorpo.store')}}" method="post">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-column">
                <h4 class="m-3">Texte corporate du site</h4>
                <textarea required name="texte_corpo" id="" cols="80" rows="10"></textarea>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="d-flex flex-column">

            <h4 class="m-3"> Prix de la session </h4>
            <input name="prix_session" type="text">

             <button class="btn btn-success mt-4" type="submit">send</button>
        </div>
    </div>
    </form>


   </div>
@stop
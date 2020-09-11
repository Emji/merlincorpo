@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h4 class="text-center">Ecrivez le commentaire</h4>
<div class="">
<form action="{{route('temoignage.store')}}" method="post">
@method('POST')
@csrf
<div class="row">
    <div class="col-8 d-flex flex-column justify-content-center">
        <textarea required name="testimonies" id="" cols="80" rows="10"></textarea>
        <div class="d-flex justify-content-center mt-3">
        <input required type="text" name="author" id="">
        <button class="btn btn-success ml-3" type="submit"> Enregistrer</button>
        </div>
    </div>
</div>

</form>
</div>
@stop
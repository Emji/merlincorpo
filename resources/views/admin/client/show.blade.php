@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<h4>Envoyer le lien à {{$client->name}} {{$client->forname}}</h4>
<form action="{{route('SendMailToClient')}}" method="post">
    @method('POST')
    @csrf
<input type="hidden" name="id" value="{{$client->id}}" placeholder="poy">
<textarea required name="message" id="" cols="60" rows="6">


</textarea>
<button type="submit"> envoi</button>
</form>
@stop
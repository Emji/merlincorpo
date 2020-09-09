@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h4 class="text-center">Newsletter client </h4>

<a href="{{route('newsletter.create')}}"><button class="btn btn-primary rounded">Envoyer une newsletter</button></a>

<h4 class="text-center">{{$newslettersCount}} abonnés</h4>
<div class="bg-light border mt-3 container">
   
    @foreach ($newsletters as $newsletter)
        <div class="row justify-content-between">
            <div class="d-flex align-items-center p-1">
            {{$newsletter->mail}}
            </div>

            <div class="mr-3 p-1">
                <form action="{{route('newsletter.destroy',['newsletter'=>$newsletter->id])}}" method="POST">

                @method('DELETE')
                @csrf
                                    
                    <button class="btn p-2 border btn-danger">delete</button>

                </form>
            </div>

            
       </div>
        
    @endforeach
 
</div>
@stop
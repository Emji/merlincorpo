@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div>
        <div>
           
            @foreach($sessions as $session)
            <div class="m-3 p-3">
                <h5 class="text-center">
                    {{$session->date}}
                    {{$session->id}}

                </h5>
            </div>

            <div class="bg-light border">
                @foreach($clients->where('session_id',$session->id) as $client)
                <div class="row">
                    <div class="col-1">
                        <div class="d-flex justify-content-around">
                            <div>
                            <p class="mt-1">{{$client->name}}</p>
                            </div>
                            <div><p class="mt-1">{{$client->forname}}</p></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex justify-content-around">
                            <div>
                            <p class="mt-1">{{$client->mail}}</p>
                            </div>
                            <div><p class="mt-1">{{$client->phone}}</p></div>
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="row"> 
                            <p class="mt-1">Le {{$client->session->date}} à {{$client->heure->heure}}</p>
                        </div>
                    </div>
                    <div class="col-1 align-items-center justify-content-center d-flex @if($client->hasPaid) bg-success @endif">
                        <div class="row"> 
                            @if($client->hasPaid)
                           <span> a payé</span>
                           @endif
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="d-flex w-100 justify-content-around">
                            <div><a href="{{route('client.show',['client'=>$client->id])}}">
                            <button class="btn btn-primary">Send Mail</button>
                            </a>
                            </div>
                            <div>
                            <form action="{{route('client.update',["client"=>$client->id])}}" method="post">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-warning">A payé</button>
                            </form>
                            </div>
                             <div>
                                <form action="{{route('client.destroy',['client'=>$client->id])}}" method="POST">

                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete Client</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach
        </div>
            
            @endforeach
       <div class="d-flex mt-2 justify-content-center">
           
        {{ $sessions->links() }}
        </div>
    </div>

@stop
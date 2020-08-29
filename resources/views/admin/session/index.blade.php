@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


    <div>
        <div class="container mt-5">
            <div class="justify-content-center d-flex">
              
                <a href="session/create"><button class="btn btn-success p-3"> Ajouter une session</button></a>
            </div>
        </div>
    </div>
@if($session)
   <div class="row mt-5">
       <div class="col-12 mt-5">
           <div class="container">
               <div class="row">
                

                   <div class="col-4 border d-flex align-items-center justify-content-center">
                       <div class="d-flex justify-content-center flex-column align-items-center p-1">
                           <label for="session">Prochaine session</label>
                          <h2>{{$session->date}}</h2>
                           <div class="row w-100 mt-2">
                               <div class="col-6 d-flex justify-content-center">
                                   <a href="{{route('session.edit',['session'=>$session->id])}}">
                                    <button class="btn p-2 border btn-warning">edit</button>
                                    </a>
                                   
                                </div>
                               <div class="col-6 d-flex justify-content-center">
                                   <form action="{{route('session.destroy',['session'=>$session->id])}}" method="POST">

                                    @method('DELETE')
                                    @csrf
                                    
                                        <button class="btn p-2 border btn-danger">delete</button>

                                    </form>
                                </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-8"style="
                        align-items: center;
                        display: flex;
                        padding-left: 58px;">
                       <div class="row">
                           @foreach($heures as $heure)
                           <div class="col-2">
                                @if($heure->taken === 0)
                                <h6 class="mt-2">{{$heure->heure}}</h6>
                                <h5 class="text-center text-success"> Disponible</h5>
                                @else
                                <h6 class="mt-2">{{$heure->heure}}</h6>
                                <h5 class="text-center text-danger"> Reservé</h5> 
                                @endif                              
                            </div>
                            @endforeach
                       </div>
                   </div>
                   
                  
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="h4 text-center mt-5">
                Vous avez {{$reservation}} sessions photo réservées
            </div>
        </div>
    </div>
   @endif
@stop
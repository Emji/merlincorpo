@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


    <div>
        <div class="container mt-5">
            <div>
              
                <a href="photo/create"><button class="btn btn-success p-3"> Ajouter des images</button></a>
            </div>
        </div>
    </div>
   <div class="row mt-5">
       <div class="col-12">
           <div class="container">
               <div class="row">
                   @foreach($photo as $phot)

                   <div class="col-4 border">
                       <div class="d-flex justify-content-center flex-column align-items-center p-1">
                           <img src="{{Storage::disk('photo')->url($phot->image)}}" style="max-height:200px;max-width:300px;width:100%" alt="">
                     
                           <div class="row w-100 mt-2">
                               <div class="col-6 d-flex justify-content-center">
                                   <a href="{{route('photo.edit',['photo'=>$phot->id])}}">
                                    <button class="btn p-2 border btn-warning">edit</button>
                                    </a>
                                   
                                </div>
                               <div class="col-6 d-flex justify-content-center">
                                   <form action="{{route('photo.destroy',['photo'=>$phot->id])}}" method="POST">

                @method('DELETE')
               @csrf
             
                  <button class="btn p-2 border btn-danger">delete</button>

               </form>
                                
                               </div>
                           </div>
                       </div>
                   </div>
                   
                   @endforeach
               </div>
           </div>
       </div>
   </div>
@stop
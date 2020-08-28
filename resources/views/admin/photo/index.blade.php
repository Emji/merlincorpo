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
                   <div class="col-4 border">
                       <div class="d-flex justify-content-center flex-column align-items-center p-1">
                           {{-- <img src="" alt=""> --}}
                           <div style="height:200px;width:300px;background-color:blue;"></div>
                           <div class="row w-100 mt-2">
                               <div class="col-6 d-flex justify-content-center">
                                   <button class="btn p-2 border btn-warning">edit</button>
                                </div>
                               <div class="col-6 d-flex justify-content-center">
                                   <button class="btn p-2 border btn-danger">delete</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@stop
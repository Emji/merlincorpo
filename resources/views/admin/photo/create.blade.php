@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger"> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="m-3">
        <form action="{{route('photo.store')}}" method="POST" enctype="multipart/form-data" class="row d-flex justify-content-between">
        @csrf
        @method('POST')
        
        <input required type="file" class="InputForm w-25" name="image" placeholder="image">


            <button class="btn btn-success "type="submit">envoyer</button>
        </form>
    </div>
</div>




@stop

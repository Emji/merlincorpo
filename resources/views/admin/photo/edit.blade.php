@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger"> {{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <img src="{{Storage::disk('photo')->url($phot->image)}}" style="max-width:450px" alt="">
            </div>
            <form action="{{route('photo.update',['photo'=>$phot->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input required type="file" name="image" placeholder="image" class="InputForm">
                <button class="btn btn-success" type="submit">submit</button>
            </form>
        </div>
    </div>
</div>


@stop
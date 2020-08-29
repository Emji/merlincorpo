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
            <h2>{{$session->date}}</h2>
            </div>
            <form action="{{route('session.update',['session'=>$session->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input required type="text" name="date" placeholder="date" class="InputForm">
                <button class="btn btn-success" type="submit">submit</button>
            </form>
        </div>
    </div>
</div>


@stop
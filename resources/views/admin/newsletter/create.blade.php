@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h4 class="text-center">Send newsletter</h4>
    <div class="row mt-3 bg-light d-flex justify-content-center">
        <div class="mt-3">


            <form action="{{route('newsletter.store')}}" method="post">
                <div class="d-flex flex-column">
                @method('POST')
                @csrf

                <textarea name="newsletter" id="" cols="120" rows="15"></textarea>
                <button class="btn btn-success mt-2" type="submit">Envoyer la newsletter </button>
                </div>
            </form>
        </div>
    </div>
@stop
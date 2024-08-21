@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('create-post')}}" class="btn btn-primary">Crear</a>
            </div>
        </div>
        <div class ="row">
            <div class ="col-12">
                <h1>Mi primer blog</h1>
                <p>primer blog</p>
            </div>
        </div>
        
        <div class ="row">

            @foreach ($newCollection as $newCard )

                <x-card name="{{$newCard['name']}}" description="{{$newCard['description']}}"  btn="{{$newCard['btn']}}" id="{{$newCard['id']}}"/>

            @endforeach

        </div>
    </div>
@endsection
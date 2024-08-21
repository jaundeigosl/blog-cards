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
                <div class = "col-3">
                    <div class = "card">
                        <img class = "card-img-top" src = "https://via.placeholder.com/150" alt="Card">
                            <div class = "card-body">
                                <h5 class="card-title">{{$newCard['name']}}</h5>
                                <p class="card-text">{{$newCard['description']}}</p>
                                <form action="{{route('specific-post')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$newCard['id']}}">
                                    <input type="hidden" name="name[]" value="{{$newCard['name']}}">
                                    <input type="hidden" name="description[]" value="{{$newCard['description']}}">
                                    <button type="submit" class="btn btn-primary">{{$newCard['btn']}}</button>
                                </form>
                                <form action="{{route('delete-post')}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="idToDelete" value="{{$newCard['id']}}">
                                    <button type="submit" class ="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
            @endforeach

        </div>
    </div>
@endsection
<div class = "col-3">
    <div class = "card">
        <img class = "card-img-top" src = "https://via.placeholder.com/150" alt="Card">
        <div class = "card-body">
            <h5 class="card-title">{{$name}}</h5>
            <p class="card-text">{{$description}}</p>
            <form action="{{route('specific-post')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <input type="hidden" name="name" value="{{$name}}">
                <input type="hidden" name="description" value="{{$description}}">
                <button type="submit" class="btn btn-primary">{{$btn}}</button>
                </form>
                <form action="{{route('delete-post')}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="idToDelete" value="{{$id}}">
                    <button type="submit" class ="btn btn-danger">Borrar</button>
                </form>
         </div>
    </div>
</div>
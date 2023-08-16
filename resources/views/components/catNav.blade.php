<div class="row justify-content-evenly py-2 mysection">
    @foreach ($genres as $genre )
    <div class="col-4 col-sm-4 col-md-2 mx-1 d-flex justify-content-center">
        <a class="btn" href="{{route('show_category', compact('genre'))}}">
            
            <button class="mybtn">{{__("messages.".$genre->genre."")}}</button>
        </a>
    </div>
    @endforeach
</div>
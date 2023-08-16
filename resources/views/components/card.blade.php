<a href="{{route('show',compact('article'))}}">
    <div class="card position-relative mycard my-3 mx-2 animate__animated {{$animate ?? '' }}">
        <div class="position-relative imgBox">
            {{-- <img class="cardimg img-fluid" src="{{Storage::url($article->img)}}" alt=""> --}}
            <img class="cardimg img-fluid" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400,300) : "/media/default.jpg" }}" alt="">
            <div class="cardcategory">
                <!-- qui va il link alla pagina con tutti i prodotti della stessa categoria -->
                <p class="m-0">{{__("messages.".$article->genre->genre."")}}</p>     
            </div>
        </div>   
        <div class="cardBody m-2 mt-0"> 
            <div class="cardtitle">
                <h2 class="titleText">{{$article->name}}</h2>
            </div>
            <div class="cardprice">
                <h4><span><span class="price">{{$article->price}}</span> &euro;</span></h4>
                <h5>{{__('messages.aggiunto da')}}: {{$article->user->name}}</h5>
            </div>
            <div class="carddescription p-1">
                <p class="fst-italic">{{$article->description}}</p>
            </div>
            <div class="carddate">
                <p> {{__('messages.creato in data')}} <span class="created">{{$article->created_at->format('d/m/y')}}</span></p>
            </div>
        </div>
    </div>
</a>
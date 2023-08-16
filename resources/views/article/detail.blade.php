<x-layout docTitle="{{__('messages.dettagli')}}" :title="$article->name">
    <style>
        path{
            
            fill: currentColor;
            
            
        }
        input[type="radio"]{
            -webkit-appearance: none;
        }
        label{
            position: relative;
            margin: auto
            height: fit-content;
            width: fit-content;
            /* color: inherit; */
            transition: 0.5s;
        }
        .fa{
            font-size:50px
            position: absolute;
            top: 50%;
            left:50%;
            tranform:translate(-50%,-80%);
        }
        input[type="radio"]:checked+label{
            color:gold !important;
            box-shadow: 0 15px 45px gold;
        }
        
        input[type="radio"],label::before,label::after{
            transition-delay: 0.5s;
            color: initial;
            padding: 0;
            margin:0;
            box-sizing: inherit;
        }
    </style>
    
    <div class="container mt-3 mb-3 pr-4 pe-4 pb-4 mysectionx">
        {{-- CONTAINER BOTTONE BACK E CATEGORIA--}}
        <div class="container mb-4">
            <div class="row">
                {{-- bottone back --}}
                <div class="col-12 col-md-3 d-flex justify-content-center align-items-center">
                    <a href="{{route('home')}}" class="btn mybtn my-3">{{__('messages.Torna indietro')}}</a> 
                </div>
                {{-- categoria --}}
                <div class="col-12 col-md-9 mysection d-flex justify-content-start align-items-center p-3 mt-3">
                    <h3 class="violet-text textlightw">{{__('messages.Categoria')}}: {{__("messages.".$article->genre->genre."")}}</h3>
                </div>
            </div>
        </div>
        {{-- CONTAINER FOTO E DESCRIZIONE --}}
        <div class="container">
            <div class="row ">
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    @if (count($article->images()->get()) <= 1)
                    <div class="coldetdxd">
                        <img class="img-fluid imgdet" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400,300) : "/media/default.jpg" }}" alt="immagini">
                    </div>     
                    @else
                    <div class="coldetdxd">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($article->images()->get() as $item)
                                <div class="swiper-slide">
                                    <img src="{{$item->getUrl(400,300)}}" class="d-block"/>
                                </div>  
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next" id="coloraAcc"></div>
                            <div class="swiper-button-prev" id="coloraAcc"></div>
                        </div> 
                    </div>
                    @endif 
                </div>
                <div class="col-12 col-md-8 d-flex align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-12 mysection p-3 my-2">
                            <h4>{{__('messages.Nome')}}: <span class="titleText">{{$article->name}}</span></h4>
                        </div>
                        <div class="col-12 mysection p-3 my-2">
                            <h4><span>{{__('messages.Prezzo')}}: € <span class="priceDet">{{$article->price}}</span></span></h4>
                        </div>
                        <button class="coldetlibtn" onclick="openModal()"><h3>{{__('messages.Leggi la descrizione')}}!</h3></button>      
                        <!-- La modale -->
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="closeModal()">&times;</span>
                                <h2>{{$article->name}}</h2>
                                <p>{{$article->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center mt-3 p-3">
        @auth
        @if(count($score->where('article_id',$article->id)->where('user_id',Auth::user()->id))==0)
        @livewire('get-vote',['article_id'=>$article->id])
        @else
        <div class="d-flex flex-column mysectionx p-3">
            <x-score :article="$article" />
            <h6 class="text-center mt-3 fst-italic">"{{__('messages.voters')}} {{$article->leaderboard->voters}}"</h6>
        </div>
        @endif
        @endauth
        @guest 
        @if(count($score->where('article_id',$article->id))==0)
        {{-- <div>
            <h3>
                Nessun Voto
            </h3>
        </div> --}}
        @else
        <div class="d-flex flex-column">
            <x-score :article="$article" />
            <h6 class="text-center mt-3 fst-italic"s>{{__('messages.voters')}} {{$article->leaderboard->voters}}</h6>
        </div>  
        @endif
        @endguest
    </div>
    
    
    
</x-layout>

{{-- script modale --}}
<script>
    // Funzione per aprire la modale
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }
    
    // Funzione per chiudere la modale
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }
    
    // Chiudi la modale cliccando all'esterno del contenuto
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal")) {
            closeModal();
        }
    }
    
    let priceDet = document.querySelector('.priceDet');
    let priceDetValue = parseFloat(priceDet.innerHTML);
    priceDet.innerHTML= priceDetValue.toFixed(2);
    
    
    let stars = document.querySelectorAll(".stella")
    
    
    if (stars.length>0) {
        for (let index = 0; index <= stars.length; index++) {
            let star = stars[index];
            
            star.addEventListener('click',(event)=>{
                setTimeout(() => {
                    let path=document.querySelectorAll("path")
                    for (let i = 0; i <= index; i++) {
                        let stella = path[i];
                        stella.setAttribute('color','gold');   
                    }  
                }, 350);
                
                
            })
        }
    }
</script>
<x-layout docTitle="home"
title="{{ $article_to_check ? __('messages.Articolo da revisionare') : __('messages.non ci sono articoli') }}">
{{-- messaggi di risposta --}}

<div class="container">
    <div class="row ">
        <div class="col-12">
            @if (session('messageRev'))
            <div class="alert alert-success text-center">
                <h3 class="lead">{{ session('messageRev') }}</h3>
                @if ($article_to_check)
                <div class="w-100 d-flex justify-content-center">
                    <form method="POST"
                    action="{{ route('revisor.old', ['article' => $article_to_check]) }}">
                    @method('PATCH')
                    @csrf
                    <button class="btn mybtn"> {{ __('messages.annulla') }} </button>
                </form>
            </div>
            @else
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex  justify-content-center">
                        <form method="POST" action="{{ route('revisor.oldArticle') }}">
                            @method('PATCH')
                            @csrf
                            <button class="btn mybtn"> {{ __('messages.annulla') }} </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
</div>
</div>

{{-- SEZIONE CON IL LOGO --}}
<div class="container">
     <div class="row justify-content-center">
        <div class="col-12 col-md-3 p-3">
            <div>
                <img class="imglogo" src="/media/logocropped.png" alt="">
            </div>
        </div>
    </div>    
</div>
{{-- SEZIONE CON ATTRIBUTI E IMMAGINE --}}
@if ($article_to_check)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 justify-content-center">
            <div class="row mysection p-3 me-1">
                <div class="col-12">
                    <h3 class="violet-text textdarkw">Attributi</h3>
                </div>
                <div class="col-12 mysectionx p-3">
                    <h3 class="text-dark"><span class="titleText">{{ __('messages.Nome') }}: {{ $article_to_check->name }}</span></h3>
                </div>
                <div class="col-12 mysectionx p-3">
                    <h3 class="text-dark">{{ __('messages.Categoria') }}: {{ $article_to_check->genre->genre }}</h3>
                </div>
                <div class="col-12 mysectionx p-3">
                    <h3 class="text-dark">{{ __('messages.Prezzo') }}: €{{ $article_to_check->price }}</h3>
                </div>
            </div>
            <div class="row mysection p-3 me-1">
                <div class="col-12">
                    <h3 class="violet-text textdarkw">{{ __('messages.Descrizione') }}</h3>
                </div>
                <div class="col-12 mysectionx">
                    <h4 class="text-dark">{{ $article_to_check->description }}</h4>
                </div>    
            </div>
        </div>
        {{-- SEZIONE CON CARD LABEL E FILTRO --}}
        <div class="col-12 col-md-6 mysection">
            @if (count($article_to_check->images()->get()) == 1)
            <div class="row p-3">
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <img class="mysectionx p-3" src="{{!$article_to_check->images()->get()->isEmpty()? $article_to_check->images()->first()->getUrl(400, 300): '/media/default.jpg' }}" class="d-block" />
                    </div>
                    
                </div>
                <div class="col-12">
                    
                    <div class="row justify-content-evenly">
                        <div class="col-12 col-md-5 mysectionx p-3">
                            <h3 class="textdarkw text-dark">{{__('messages.Revisione immagini')}}</h3>
                            <li><span class="me-2 wMe ">{{__('messages.Adulti')}}:</span><span class="{{ $article_to_check->images()->first()->adult}}"></span></li>
                            <li><span class="me-2 wMe ">{{__('messages.Satira')}}:</span><span class="{{ $article_to_check->images()->first()->spoof}}"></span></li>
                            <li><span class="me-2 wMe ">{{__('messages.Medicina')}}:</span><span class="{{ $article_to_check->images()->first()->medical}}"></span></li>
                            <li><span class="me-2 wMe ">{{__('messages.Violenza')}}:</span><span class="{{ $article_to_check->images()->first()->violence}}"></span></li>
                            <li><span class="me-2 wMe ">{{__('messages.Razzismo')}}:</span><span class="{{ $article_to_check->images()->first()->racy}}"></span></li>
                        </div>
                        <div class="col-12 col-md-5 mysectionx p-3">
                            <h3 class="textdarkw text-dark">{{__('messages.ettichette')}}</h3>
                            @foreach ($article_to_check->images()->first()->labels as $label )
                            <li class="">{{$label}}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif(count($article_to_check->images()->get()) > 1)
        <div class="swiper mySwiper hContent">
            <div class="swiper-wrapper">
                @foreach ($article_to_check->images()->get() as $item)
                <div class="swiper-slide">
                    <div class="card">
                        <img src="{{ $item->getUrl(400, 300) }}" class="d-block" />
                        <div class="card-body bgMain">
                            <div class="d-flex align-items-center">
                                <div class="pe-3"> 
                                    <h5>Revisione immagini</h5>
                                    <ul>
                                        <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Adulti')}}:</span><span class="{{ $article_to_check->images()->first()->adult}}"></span></li>
                                        <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Satira')}}:</span><span class="{{ $article_to_check->images()->first()->spoof}}"></span></li>
                                        <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Medicina')}}:</span><span class="{{ $article_to_check->images()->first()->medical}}"></span></li>
                                        <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Violenza')}}:</span><span class="{{ $article_to_check->images()->first()->violence}}"></span></li>
                                        <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Razzismo')}}:</span><span class="{{ $article_to_check->images()->first()->racy}}"></span></li>
                                    </ul>
                                </div>
                                <div class="borderL ps-2">
                                    <h5>{{__('messages.ettichette')}}</h5>
                                    <ul>
                                        @foreach ($item->labels as $label )
                                        <li class="colorAcc">{{$label}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>          
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination mt-2"></div>
            <div class="swiper-button-next" id="coloraAcc"></div>
            <div class="swiper-button-prev" id="coloraAcc"></div>
        </div>
        @elseif(count($article_to_check->images()->get()) == 0)
        <div class="coldetdxd ">
            <div class="card">
                <img src="{{!$article_to_check->images()->get()->isEmpty()? $article_to_check->images()->first()->getUrl(400, 300): '/media/default.jpg' }}" class="d-block" />
            </div>
        </div>
        @endif
        {{-- <div class=" col-12 col-md-6 coldetdx">
            @if (count($article_to_check->images()->get()) == 1)
            <div class="coldetdxd ">
                
                <div class="card">
                    <img src="{{!$article_to_check->images()->get()->isEmpty()? $article_to_check->images()->first()->getUrl(400, 300): '/media/default.jpg' }}" class="d-block" />
                    <div class="card-body bgMain">
                        <div class="d-flex">
                            <div class="pe-3"> 
                                <h5>{{__('messages.Revisione immagini')}}</h5>
                                <ul>
                                    <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Adulti')}}:</span><span class="{{ $article_to_check->images()->first()->adult}}"></span></li>
                                    <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Satira')}}:</span><span class="{{ $article_to_check->images()->first()->spoof}}"></span></li>
                                    <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Medicina')}}:</span><span class="{{ $article_to_check->images()->first()->medical}}"></span></li>
                                    <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Violenza')}}:</span><span class="{{ $article_to_check->images()->first()->violence}}"></span></li>
                                    <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Razzismo')}}:</span><span class="{{ $article_to_check->images()->first()->racy}}"></span></li>
                                </ul>
                            </div>
                            <div class="borderL ps-2">
                                <h5>{{__('messages.ettichette')}}</h5>
                                <ul>
                                    @foreach ($article_to_check->images()->first()->labels as $label )
                                    <li class="colorAcc">{{$label}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
            @elseif(count($article_to_check->images()->get()) > 1)
            <div class="swiper mySwiper hContent">
                <div class="swiper-wrapper">
                    @foreach ($article_to_check->images()->get() as $item)
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="{{ $item->getUrl(400, 300) }}" class="d-block" />
                            <div class="card-body bgMain">
                                <div class="d-flex align-items-center">
                                    <div class="pe-3"> 
                                        <h5>Revisione immagini</h5>
                                        <ul>
                                            <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Adulti')}}:</span><span class="{{ $article_to_check->images()->first()->adult}}"></span></li>
                                            <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Satira')}}:</span><span class="{{ $article_to_check->images()->first()->spoof}}"></span></li>
                                            <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Medicina')}}:</span><span class="{{ $article_to_check->images()->first()->medical}}"></span></li>
                                            <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Violenza')}}:</span><span class="{{ $article_to_check->images()->first()->violence}}"></span></li>
                                            <li class="colorAcc"><span class="me-2 wMe colorAcc">{{__('messages.Razzismo')}}:</span><span class="{{ $article_to_check->images()->first()->racy}}"></span></li>
                                        </ul>
                                    </div>
                                    <div class="borderL ps-2">
                                        <h5>{{__('messages.ettichette')}}</h5>
                                        <ul>
                                            @foreach ($item->labels as $label )
                                            <li class="colorAcc">{{$label}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>          
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-2"></div>
                <div class="swiper-button-next" id="coloraAcc"></div>
                <div class="swiper-button-prev" id="coloraAcc"></div>
            </div>
            @elseif(count($article_to_check->images()->get()) == 0)
            <div class="coldetdxd ">
                <div class="card">
                    <img src="{{!$article_to_check->images()->get()->isEmpty()? $article_to_check->images()->first()->getUrl(400, 300): '/media/default.jpg' }}" class="d-block" />
                </div>
            </div>
            @endif --}}
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <form method="POST" action="{{ route('revisor.accept', ['article' => $article_to_check]) }}">
                    @method('PATCH')
                    @csrf
                    <button class="btn mybtn">{{ __('messages.accetta') }}</button>
                </form>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <form method="POST" action="{{ route('revisor.refuse', ['article' => $article_to_check]) }}">
                    @method('PATCH')
                    @csrf
                    <button class="btn mybtn">{{ __('messages.rifiuta') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="container ">
    <div class="row vh-60 ">
        <div class="col-12 d-flex mt-5 justify-content-center">
            <a class="btn mybtn" href="{{ route('home') }}">{{ __('messages.Torna alla Home') }}</a>
        </div>
    </div>
</div>
@endif

</x-layout>

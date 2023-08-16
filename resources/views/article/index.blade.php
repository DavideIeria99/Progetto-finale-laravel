<x-layout docTitle="{{__('messages.Tutti i prodotti')}}" title="{{__('messages.Tutti i prodotti')}}">
    <div class="container mt-3">
        
        {{-- LISTA CATEGORIE --}}

        <x-catNav />

    </div>
    {{-- LISTA CARD --}}
    <div class="container mysection">
        <div class="row">
            @forelse ($articles as $article)
            <div class="col-12 col-sm-8 col-md-3 mx-sm-auto">
                <x-card :article="$article" animate="animate__fadeIn"/>
            </div>
            @empty
            <div class="container my-5 py-5">
                <div class="row">
                    <div class="col-12 my-5 py-5">
                        <h2 class="text-center">{{__('messages.Nessun prodotto')}}</h2> 
                    </div>
                </div>
            </div>
            @endforelse 
        </div>
        <div class="col-12 d-flex justify-content-center mt-5">
            {{$articles->links()}}
        </div>
       
    </div>

</x-layout>
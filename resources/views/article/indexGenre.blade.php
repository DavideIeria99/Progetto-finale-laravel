<x-layout docTitle='{{__("messages.".$genre->genre."")}}' title='{{__("messages.".$genre->genre."")}}'>
    
    <div class="container mt-3">
        
        {{-- LISTA CATEGORIE --}}

        <x-catNav />

    </div>
    
    @if ( count($articles)>0)
    <div class="container mysection ">
        <div class="row">
            @foreach ($articles as $single)
            <div class="col-12 col-md-3">
                <x-card :article="$single" animate="animate__fadeIn"></x-card>
            </div>
            @endforeach 
            <div class="col-12 d-flex justify-content-center mt-5">
                {{$articles->links()}}
            </div>
        </div>
    </div>
    @else
    <div class="container my-5 py-5 mysection">
        <div class="row">
            <div class="col-12 my-5 py-5">
                <h2 class="text-center">{{__('messages.Nessun prodotto')}}</h2> 
            </div>
        </div>
    </div>
    @endif

    
    
</x-layout>



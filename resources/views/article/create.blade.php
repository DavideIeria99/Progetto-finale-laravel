<x-layout docTitle="{{__('messages.CREA IL TUO PRODOTTO')}}" title="{{__('messages.CREA IL TUO PRODOTTO')}}">
  <div class="container">
    <div class="row myformdiv justify-content-center">
      <div class="col-12 col-sm-10 col-md-7 mysection p-3">
        @livewire('article-form', compact('genres'))
      </div>           
    </div>
  </div>
</x-layout>


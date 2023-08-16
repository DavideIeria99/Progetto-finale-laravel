<form wire:submit.prevent="store" class="my-5">
    <h2 class="text-center">{{__('messages.Esprimi il tuo voto')}}</h2>
    <div class="d-flex justify-content-center">
    <span class="form-check mx-3">
        <input
            class=" @error('vote')
        is-invalid
        @enderror"
            type="radio" value="1" wire:model="vote"
            id="voto1">
        <label for="voto1" class="stella"><i class="fa-solid fa-star icons" aria-hidden="true"></i></label>   
    </span>

    <span class="form-check mx-3">
        <input
            class=" @error('vote')
        is-invalid
        @enderror"
            type="radio" value="2" wire:model="vote"
            id="voto2">
        <label for="voto2" class="stella"><i class="fa-solid fa-star icons" aria-hidden="true"></i></label>
    </span>

    <span class="form-check mx-3">
        <input
            class=" @error('vote')
        is-invalid
        @enderror"
            type="radio" value="3" wire:model="vote"
            id="voto3">
        <label for="voto3" class="stella"><i class="fa-solid fa-star icons" aria-hidden="true"></i></label>
    </span>

    <span class="form-check mx-3">
        <input
            class=" @error('vote')
        is-invalid
        @enderror"
            type="radio" value="4" wire:model="vote"
            id="voto4">
        <label for="voto4" class="stella"><i class="fa-solid fa-star icons" aria-hidden="true"></i></label>
    </span>

    <span class="form-check mx-3">
        <input
            class="@error('vote')
        is-invalid
        @enderror"
            type="radio" value="5" wire:model="vote"
            id="voto5">
        <label for="voto5" class="stella"><i class="fa-solid fa-star icons" aria-hidden="true"></i></label>
    </span>
    </div>
        <div>
        @error('vote')
            <p class="text-danger alert alert-warning text-center">{{ $message }}</p>
        @enderror
    </div>
    <p class="d-none" value="{{$article_id}}" wire:model="article_id"></p>
    <div class="d-flex justify-content-center my-3">
        <button type="submit"  class="mybtn">{{__('messages.Vota')}}</button>
    </div>

</form>
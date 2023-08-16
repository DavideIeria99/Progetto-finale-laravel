<x-layout docTitle="{{__('messages.Accedi')}}" title="{{__('messages.Accedi')}}">
    <div class="container">
        <div class="row mysezione11">
            <h3>{{__('messages.felice di vederti')}}</h3>
        </div>
        <div class="row justify-content-center p-3">
            <div class="col-12 col-md-6 collog mysection m-3 p-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-2 mt-2">
                        <label for="userMail" class="form-label">
                            <h5>{{__('messages.email utente')}}</h5>
                        </label>
                        <input type="email"
                            class="form-control @error('email')is-invalid @enderror myinput text-light"name="email" id="userMail" value={{old('email')}}>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2 mt2">
                        <label for="userPassword" class="form-label">
                            <h5>{{__('messages.Password')}}</h5>
                        </label>
                        <input type="password" name="password"
                            class="form-control @error('password')
                            is-invalid
                        @enderror myinput text-light"
                            id="userPassword">
                         @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2 mt-2 form-check d-flex justify-content-center">
                        <button type="submit" class="btn mybtn  px-4">{{__('messages.Accedi')}}</button>
                    </div>
                </form>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="mb-3 ">
                    <h5 class="ms-3 textdarkw">{{__('messages.Non sei ancora registrato?')}}</h5>
                    <a href="{{ route('register') }}" class="nav-link text-center"><button
                            class="btn mybtn ms-4">{{__('messages.Registrati')}}</button></a>
                </div>
            </div>
        </div>
    </div>
</x-layout>

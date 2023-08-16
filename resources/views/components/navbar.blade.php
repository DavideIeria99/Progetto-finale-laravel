<nav class="navbar navbar-expand-lg navbar-custom mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="divlogo">
                <img class="imglogo" src="/media/logocropped.png" alt="logo">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link mylinks" href="{{route('article_index')}}">{{ __('messages.Tutti i prodotti')}}</a>
              </li>
              <li class="nav-item">
                <form class="d-flex align-items-center mysearchbar" role="search" action="{{route('searchArticle')}}" method="GET">
                  @csrf
                  <input class="form-control myinputsearch me-2" name="searched" type="search" placeholder="{{ __('messages.cerca un prodotto')}}" aria-label="Search">
                  <button class="btn mybtn" type="submit">{{ __('messages.cerca');}}</button>
                </form>
              </li>
              <li class="nav-item">
                
                @if (session('locale') == 'it' || !session('locale'))
                  <x-_locale lang='en' /> 
                  <x-_locale lang='de' />
                @elseif (session('locale') == 'en')
                  <x-_locale lang='it'/>
                  <x-_locale lang='de' /> 
                @elseif (session('locale') == 'de')
                  <x-_locale lang='it'/>
                  <x-_locale lang='en' />
                @endif
              </li>
        </ul>
        @auth
        <ul class="navbar-nav">  
          
          <li class="nav-item dropdown mydrop me-md-5">
            <a class="nav-link linkbenvenuto dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __('messages.Benvenuto')}} {{Auth::user()->name}}
            </a>
            @if (Auth::user()->is_revisor)
               @if ((App\Models\Article::toBeRevisionedCount())>0)
                <span class="position-absolute top-0 end-0 translate_middle badge ruonded-pill bg-danger">
                  {{App\Models\Article::toBeRevisionedCount()}}
                </span>
                @endif 
            @endif
            <ul class="dropdown-menu">
                @if (Auth::user()->is_revisor)
                <li class="dropdown-item">
                  <a class="nav-link btnalert alert-danger btn-sm position-relative" aria-current="page" href="{{route('revisor_index')}}">{{ __('messages.Zona revisione')}}  
                    <span class="position-absolute top-0 start-75 translate_middle badge ruonded-pill bg-danger">
                      {{App\Models\Article::toBeRevisionedCount()}}
                    </span>          
                  </a>           
                  {{-- <span class="visually-hidden">{{ __('messages.Prodotti da accettare ')}}</span>    --}}
              </li>
              @endif
                @auth
          <li class="dropdown-item">
            <a class="nav-link" href="{{route('create')}}">{{ __('messages.Aggiungi un prodotto')}}</a>
          </li>
          @endauth
              </li>
              <li class="dropdown-item">
                  <form method="POST" action="{{route('logout')}}">
                  @csrf
                  <button class="dropdown-item nav-link colorAcc">{{ __('messages.Esci')}}</button>
                </form>
              </li>
            </ul>  
        </ul>    
        @else
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('register')}}" class="nav-link">{{ __('messages.Registrati')}} </a>
            </li>
            <li class="nav-item me-md-3">
                <a href="{{route('login')}}" class="nav-link">{{ __('messages.Accedi')}}  </a>
            </li>
        </ul>
        @endauth
       </div>
    </div>
</nav>

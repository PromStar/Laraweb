<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
   <button class="btn btn-primary" id="menu-toggle">{{__("Toggle Menu")}}</button>

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLanguages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="flag-icon flag-icon-{{ App::getLocale() }}"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLanguages">
               @foreach (config('languages') as $lang => $language)
               @if ($lang != App::getLocale())
               <a class="dropdown-item"  href="{{ route('lang', $lang) }}" aria-labelledby="navbarDropdownLanguages">
                  <span class="flag-icon flag-icon-{{$lang}}"></span> {{$language}}
               </a>
               @endif
               @endforeach
            </div>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="avatar avatar-online">
                  <img src="{{ asset('images/User.png' )}}" alt="...">
               </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAccount">
               <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit();" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> {{__("Logout")}}</a>
               <form id="nav-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
               </form>
            </div>
         </li>
      </ul>
   </div>
</nav>

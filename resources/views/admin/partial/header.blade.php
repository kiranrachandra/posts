
<header class="main-header"> 
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-target="#navbarCollapse" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
         
        @if(Auth::check()) 
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-user">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile"> {{ str_limit(Auth::user()->name, 15) }} </span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu"> 
                        <li>
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                            <!--<a href="{{ ('/logout') }}"><i class="fa fa-lock"></i> Sign Out</a>-->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>      
        @endif

    </nav>
</header>

<nav class="navbar navbar-expand-lg navbar-light  d-flex justify-content-between">
    <a class="navbar-brand" href="/marketpage"><img
            src="{{\Illuminate\Support\Facades\URL::asset('asset/HireMe 1 - Black Transparent.png')}}" id="hireme-logo"></a>

    <form action="/marketpage/search-item" class="d-flex justify-content-between search-bar-marketplace">
        <input type="text" name="query" id="search-input" placeholder='Try "Pizza Photographer"'>
        <div>
            <button type="submit" class="search-submit"><i class="icon-search"
                                                                       style="font-size: 2.4rem"></i></button>
        </div>
    </form>

    <div class="d-flex justify-content-between">
        <div class="cart-menu d-flex" style="align-items: center">
            <a href="/cart" class="d-flex flex-fill align-items-center" style="cursor: pointer">
                <span class="iconify" data-icon="la:shopping-cart" style="font-size: 32px"></span>
                <div style="font-size: 1.4rem; margin-top: 0.4em">Cart</div>
{{--                <div class="checkout-counter" style="width: 24px; height: auto; display: block">0</div>--}}
            </a>
        </div>

        <div class="flex-fill profile-menu align-items-center d-flex">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" style="align-items: center">
                        <img
                            src={{\Illuminate\Support\Facades\Storage::url(auth()->user()->profile_picture)}}
                            width=36px
                            height=36px
                            style=
                            "object-fit: cover;
                 border-radius: 100px;
                 box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
                "
                        >
                        <div>
                            @auth
                                <span
                                    style="font-size: 1.4rem ;font-weight: 700; padding-left: 0.8em">{{auth()->user()->name}}</span>
                            @endauth
                        </div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li lass="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>

                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>

<nav class="navbar d-flex justify-content-center category-navbar">
    <ul>
        @for($i=0;$i<count($categories);$i++)
            <li><a href="/category/{{$categories[$i]->id}}" class="category-link">{{$categories[$i]->name}}</a></li>
        @endfor
    </ul>
</nav>

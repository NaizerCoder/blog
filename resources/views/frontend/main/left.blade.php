<aside id="colorlib-aside" role="complementary" class="js-fullheight" style="padding-top:2em">
    @auth()
    <div class="dropdown d-inline-block mb-5" style="z-index:999999">
        <button type="button" class="btn header-item waves-effect mt-10" id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle header-profile-user" style="width:40px;"
                 src="{{asset('andrea/images/noname.jpg')}}" alt="Header Avatar">
            <span class="d-none d-sm-inline-block ml-1">{{auth()->user()->name}}</span>
            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
        </button>
        <div class="dropdown-menu"
             style="position: absolute;
                    will-change: transform;
                    top: 0px;
                    left: 0px;
                    transform: translate3d(131px, 70px, 0px);
                    border:0;
                    margin-top:-5px;
                    padding:0;
                   ">
            <a class="no-border" href="javascript:void(0)">
                <span>
                        <form action="{{route('logout')}}" method="post">
                        @csrf
                            <button type="submit" class="btn btn-block btn-outline-secondary btn-lg no-border">
                                Выйти
                            </button>
                        </form>

                </span>
            </a>
        </div>
    </div>
    @endauth()

    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li class="colorlib-active"><a href="/">Лента</a></li>
            <li><a href="/personal" target="_blank">Личный кабинет</a></li>
            <li><a href="#">Релиз</a></li>
            @guest()
                <li><i class="fas fa-sign-in-alt"></i><a href="/login"> Войти</a></li>
            @endguest()
        </ul>
    </nav>

    <div class="colorlib-footer">
        <h1 id="colorlib-logo" class="mb-5"><a href="{{route('frontend.main.index')}}" class="d-inline"
                                               style="background-image: url({{asset('andrea/images/bg-5.jpg')}})">Travel<br>Blog</a>
        </h1>
        <p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            NaizerCoder &copy;<script>document.write(new Date().getFullYear());</script>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

    </div>
</aside> <!-- END COLORLIB-ASIDE -->

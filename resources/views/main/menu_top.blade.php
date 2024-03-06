<nav class="navbar navbar-expand-lg navbar-light">
    <div class="collapse navbar-collapse" id="edicaMainNav">
        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">


            </li>
    </div>
    <div>
        @auth()
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-block btn-outline-secondary btn-lg">Выйти</button>
            </form>
        @endauth()
        @guest()
            <a href="{{asset("/login")}}" class="btn btn-block btn-outline-secondary btn-lg">Войти</a>
        @endguest
    </div>
</nav>


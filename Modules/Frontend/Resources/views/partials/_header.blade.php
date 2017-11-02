<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('frontend.home.index') }}">Д-р Светлана Попова</a>
            </div>
            {!! Menu::get('main')->asUl(['class'=> 'nav navbar-nav']) !!}
        </div>
    </nav>
</header>

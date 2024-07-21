<header class="header header--fixed">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <button class="header__menu" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <a href="/" class="header__logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="Movies & TV Shows, Online cinema HTML Template">
                    </a>

                    <ul class="header__nav">
                        <li class="header__nav-item">
                            <a class="header__nav-link {{ request()->is('/') ? 'text-blue-500' : '' }}" href="/"
                                role="button">Home</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link {{ request()->is('catalog') ? 'text-blue-500' : '' }}"
                                href="/catalog" role="button">Catalog</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link {{ request()->is('catalog') ? 'text-blue-500' : '' }}"
                                href="/catalog" role="button">About
                                us</a>
                        </li>
                    </ul>

                    <div class="header__actions">
                        <form action="#" class="header__form">
                            <input class="header__form-input" type="text" placeholder="I'm looking for...">
                            <button class="header__form-btn" type="button">Search</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

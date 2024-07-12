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
                            <a class="header__nav-link {{ request()->is('pricing') ? 'text-blue-500' : '' }}"
                                href="/pricing" role="button">Pricing Plans</a>
                        </li>

                        <li class="header__nav-item">
                            <a class="header__nav-link {{ request()->is('live') ? 'text-blue-500' : '' }}"
                                href="/live" role="button">Live</a>
                        </li>



                        <li class="header__nav-item">
                            <a class="header__nav-link header__nav-link--more" href="#" role="button"
                                id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">More</a>
                            <ul class="dropdown-menu header__nav-menu header__nav-menu--scroll"
                                aria-labelledby="dropdownMenu3">
                                <li><a class="{{ request()->is('about') ? 'text-blue-500' : '' }}" href="about">About
                                        us</a></li>
                                <li><a class="{{ request()->is('profile') ? 'text-blue-500' : '' }}"
                                        href="profile">Profile</a></li>
                                <li><a class="{{ request()->is('contacts') ? 'text-blue-500' : '' }}"
                                        href="contacts">Contacts</a></li>
                                <li><a class="{{ request()->is('interview') ? 'text-blue-500' : '' }}"
                                        href="interview">Interview</a></li>
                                <li><a class="{{ request()->is('admin/index') ? 'text-blue-500' : '' }}"
                                        href="../admin/index" target="_blank">Admin pages</a></li>
                                <li><a class="{{ request()->is('privacy') ? 'text-blue-500' : '' }}"
                                        href="privacy">Privacy policy</a></li>
                                <li><a class="{{ request()->is('signin') ? 'text-blue-500' : '' }}" href="signin">Sign
                                        in</a></li>
                                <li><a class="{{ request()->is('signup') ? 'text-blue-500' : '' }}" href="signup">Sign
                                        up</a></li>
                                <li><a class="{{ request()->is('forgot') ? 'text-blue-500' : '' }}"
                                        href="forgot">Forgot password</a></li>
                                <li><a class="{{ request()->is('404') ? 'text-blue-500' : '' }}" href="404">404
                                        Page</a></li>
                            </ul>
                        </li>

                    </ul>

                    <div class="header__actions">
                        <form action="#" class="header__form">
                            <input class="header__form-input" type="text" placeholder="I'm looking for...">
                            <button class="header__form-btn" type="button">Search</button>
                        </form>

                        <a href="signin" class="header__user">
                            <span>Sign in</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

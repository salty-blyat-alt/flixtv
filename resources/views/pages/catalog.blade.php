<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- tailwind cdn --}}
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel="stylesheet"
        />
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css" />
        <link rel="stylesheet" href="css/bootstrap-grid.min.css" />
        <link rel="stylesheet" href="css/owl.carousel.min.css" />
        <link rel="stylesheet" href="css/slider-radio.css" />
        <link rel="stylesheet" href="css/select2.min.css" />
        <link rel="stylesheet" href="css/magnific-popup.css" />
        <link rel="stylesheet" href="css/plyr.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel="stylesheet"
        />
        <!-- Favicons -->
        <link
            rel="icon"
            type="image/png"
            href="icon/favicon-32x32.png"
            sizes="32x32"
        />
        <link rel="apple-touch-icon" href="icon/favicon-32x32.png" />

        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Dmitry Volkov" />
        <title>FlixTV – Movies & TV Shows, Online cinema HTML Template</title>
    </head>

    <body>
        <!-- header (hidden style) -->
        <x-navbar />
        <!-- end header -->

        <!-- head -->
        <section class="section section--head section--head-fixed">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <h1 class="section__title section__title--head">
                            Catalog
                        </h1>
                    </div>

                    <div class="col-12 col-xl-6">
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item">
                                <a href="/">Home</a>
                            </li>
                            <li
                                class="breadcrumb__item breadcrumb__item--active"
                            >
                                Catalog
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end head -->

        <!-- categories -->
        <section class="section section--pb0">
            <div class="container">
                <div class="row row--grid">
                    @php $genres = [ ['id' => 28, 'name' => 'Action', 'img' =>
                    'https://i.ibb.co/x2bF5sx/action-catelog.jpg'], ['id' => 12,
                    'name' => 'Adventure', 'img' =>
                    'https://i.ibb.co/HqSRg1f/adventure-catelog.jpg'], ['id' =>
                    16, 'name' => 'Animation', 'img' =>
                    'https://i.ibb.co/YdRCx76/animation-catelog.jpg'], ['id' =>
                    35, 'name' => 'Comedy', 'img' =>
                    'https://i.ibb.co/qdJqnFD/comedy-catelog.jpg'], ['id' => 80,
                    'name' => 'Crime', 'img' =>
                    'https://i.ibb.co/d7FS2LC/crime-catelog.jpg'], ['id' => 99,
                    'name' => 'Documentary', 'img' =>
                    'https://i.ibb.co/n8hCPt2/documentary-catelog.jpg'], ['id'
                    => 18, 'name' => 'Drama', 'img' =>
                    'https://i.ibb.co/Gxhsq1p/drama-catelog.jpg'], ['id' =>
                    10751, 'name' => 'Family', 'img' =>
                    'https://i.ibb.co/gSWcQPs/family-poster.jpg'], ['id' => 14,
                    'name' => 'Fantasy', 'img' =>
                    'https://i.ibb.co/4S0FpV8/fantasy-catelog.jpg'], ['id' =>
                    36, 'name' => 'History', 'img' =>
                    'https://i.ibb.co/v1DyJT7/history-catelog.jpg'], ['id' =>
                    27, 'name' => 'Horror', 'img' =>
                    'https://i.ibb.co/VxyshLw/horror-catelog.jpg'], ['id' =>
                    10402, 'name' => 'Music', 'img' =>
                    'https://i.ibb.co/47LVJc7/music-catelog.jpg'], ['id' =>
                    9648, 'name' => 'Mystery', 'img' =>
                    'https://i.ibb.co/rfjSpLF/mystery.jpg'], ['id' => 10749,
                    'name' => 'Romance', 'img' =>
                    'https://i.ibb.co/934pz3z/romance-catelog.jpg'], ['id' =>
                    878, 'name' => 'Science Fiction', 'img' =>
                    'https://i.ibb.co/48dz9rm/scifi-catelog.jpg'], ['id' =>
                    10770, 'name' => 'TV Movie', 'img' =>
                    'https://i.ibb.co/31CmssZ/tv-paster.jpg'], ['id' => 53,
                    'name' => 'Thriller', 'img' =>
                    'https://i.ibb.co/B3cs4jK/thriller-catelog.jpg'], ['id' =>
                    10752, 'name' => 'War', 'img' =>
                    'https://i.ibb.co/Ny7QYvp/war-catelog.jpg'], ['id' => 37,
                    'name' => 'Western', 'img' =>
                    'https://i.ibb.co/5Rs3Pj1/western-catelog.jpg'], ]; @endphp
                    @foreach ($genres as $genre)
                    <x-category-card
                        image="{{ $genre['img'] }}"
                        title="{{ $genre['name'] }}"
                        value="{{ rand(100, 500) }}"
                        link="/category?genre={{ $genre['id'] }}"
                    />
                    @endforeach
                </div>
            </div>
        </section>
        <!-- endcategories -->

        <!-- popular -->
        <section class="section section--pb0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">
                            <a href="category">Top Rated Movies</a>
                        </h2>
                    </div>

                    <div class="col-12">
                        <div class="section__carousel-wrap">
                            <div
                                class="section__carousel owl-carousel"
                                id="popular"
                            >
                                @php $genres = [ 28 => 'Action', 12 =>
                                'Adventure', 16 => 'Animation', 35 => 'Comedy',
                                80 => 'Crime', 99 => 'Documentary', 18 =>
                                'Drama', 10751 => 'Family', 14 => 'Fantasy', 36
                                => 'History', 27 => 'Horror', 10402 => 'Music',
                                9648 => 'Mystery', 10749 => 'Romance', 878 =>
                                'Science Fiction', 10770 => 'TV Movie', 53 =>
                                'Thriller', 10752 => 'War', 37 => 'Western', ];
                                @endphp @foreach ($topRates['results'] as
                                $movie) @php $movieGenres = []; foreach
                                ($movie['genre_ids'] as $genreId) { if
                                (isset($genres[$genreId])) { $movieGenres[] =
                                $genres[$genreId]; } } @endphp
                                <x-carousel-card
                                    imgSrc="{{
                                        $movie['poster_path']
                                            ? 'https://image.tmdb.org/t/p/w500'
                                                  .$movie['poster_path']
                                            : 'default-image-path.jpg'
                                    }}"
                                    detailsUrl="movie/detail/{{ $movie['id'] }}"
                                    title="{{ $movie['title'] }}"
                                    rating="{{ $movie['vote_average'] }}"
                                    category="{{ implode(', ', $movieGenres) }}"
                                    year="{{
                                        date(
                                            'Y',
                                            strtotime($movie['release_date'])
                                        )
                                    }}"
                                />
                                @endforeach
                            </div>

                            <button
                                class="section__nav section__nav--cards section__nav--prev"
                                data-nav="#popular"
                                type="button"
                            >
                                <svg
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M1.25 7.72559L16.25 7.72559"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>

                            <button
                                class="section__nav section__nav--cards section__nav--next"
                                data-nav="#popular"
                                type="button"
                            >
                                <svg
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end popular -->

        <!-- newest -->
        <section class="section section--pb0 section--gradient">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">Upcoming Movies</h2>
                    </div>

                    <div class="col-12">
                        <div class="section__carousel-wrap">
                            <div
                                class="section__carousel owl-carousel"
                                id="newest"
                            >
                                @foreach ($upComingMovies['results'] as $movie)
                                @php $movieGenres = []; foreach
                                ($movie['genre_ids'] as $genreId) { if
                                (isset($genres[$genreId])) { $movieGenres[] =
                                $genres[$genreId]; } } @endphp
                                <x-carousel-card
                                    imgSrc="{{
                                        $movie['poster_path']
                                            ? 'https://image.tmdb.org/t/p/w500'
                                                  .$movie['poster_path']
                                            : 'default-image-path.jpg'
                                    }}"
                                    detailsUrl="movie/detail/{{ $movie['id'] }}"
                                    title="{{ $movie['title'] }}"
                                    rating="{{ $movie['vote_average'] }}"
                                    category="{{ implode(', ', $movieGenres) }}"
                                    year="{{
                                        date(
                                            'Y',
                                            strtotime($movie['release_date'])
                                        )
                                    }}"
                                />
                                @endforeach
                            </div>

                            <button
                                class="section__nav section__nav--cards section__nav--prev"
                                data-nav="#newest"
                                type="button"
                            >
                                <svg
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M1.25 7.72559L16.25 7.72559"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                            <button
                                class="section__nav section__nav--cards section__nav--next"
                                data-nav="#newest"
                                type="button"
                            >
                                <svg
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end newest -->

        <!-- footer -->
        <x-footer />
        <!-- end footer -->

        <!-- JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/slider-radio.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/smooth-scrollbar.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plyr.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    {{-- tailwind cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slider-radio.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/plyr.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="icon/favicon-32x32.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
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
                    <h1 class="section__title section__title--head">Catalog</h1>
                </div>

                <div class="col-12 col-xl-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="/">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Catalog</li>
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
                @php
                    $genres = [
                        ['id' => 28, 'name' => 'Action'],
                        ['id' => 12, 'name' => 'Adventure'],
                        ['id' => 16, 'name' => 'Animation'],
                        ['id' => 35, 'name' => 'Comedy'],
                        ['id' => 80, 'name' => 'Crime'],
                        ['id' => 99, 'name' => 'Documentary'],
                        ['id' => 18, 'name' => 'Drama'],
                        ['id' => 10751, 'name' => 'Family'],
                        ['id' => 14, 'name' => 'Fantasy'],
                        ['id' => 36, 'name' => 'History'],
                        ['id' => 27, 'name' => 'Horror'],
                        ['id' => 10402, 'name' => 'Music'],
                        ['id' => 9648, 'name' => 'Mystery'],
                        ['id' => 10749, 'name' => 'Romance'],
                        ['id' => 878, 'name' => 'Science Fiction'],
                        ['id' => 10770, 'name' => 'TV Movie'],
                        ['id' => 53, 'name' => 'Thriller'],
                        ['id' => 10752, 'name' => 'War'],
                        ['id' => 37, 'name' => 'Western'],
                    ];
                @endphp
                @foreach ($genres as $genre)
                    <x-category-card image="https://i.ibb.co/9Ym10G5/pepsi.jpg" title="{{ $genre['name'] }}"
                        value="{{ rand(100, 500) }}" link="/category?genre={{ $genre['id'] }}" />
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
                    <h2 class="section__title"><a href="category">Top Rated Movies</a></h2>
                </div>

                <div class="col-12">
                    <div class="section__carousel-wrap">
                        <div class="section__carousel owl-carousel" id="popular">
                            @php
                                $genres = [
                                    28 => 'Action',
                                    12 => 'Adventure',
                                    16 => 'Animation',
                                    35 => 'Comedy',
                                    80 => 'Crime',
                                    99 => 'Documentary',
                                    18 => 'Drama',
                                    10751 => 'Family',
                                    14 => 'Fantasy',
                                    36 => 'History',
                                    27 => 'Horror',
                                    10402 => 'Music',
                                    9648 => 'Mystery',
                                    10749 => 'Romance',
                                    878 => 'Science Fiction',
                                    10770 => 'TV Movie',
                                    53 => 'Thriller',
                                    10752 => 'War',
                                    37 => 'Western',
                                ];
                            @endphp

                            @foreach ($topRates['results'] as $movie)
                                @php
                                    $movieGenres = [];
                                    foreach ($movie['genre_ids'] as $genreId) {
                                        if (isset($genres[$genreId])) {
                                            $movieGenres[] = $genres[$genreId];
                                        }
                                    }
                                @endphp
                                <x-carousel-card
                                    imgSrc="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : 'default-image-path.jpg' }}"
                                    detailsUrl="movie/detail/{{ $movie['id'] }}" title="{{ $movie['title'] }}"
                                    rating="{{ $movie['vote_average'] }}" category="{{ implode(', ', $movieGenres) }}"
                                    year="{{ date('Y', strtotime($movie['release_date'])) }}" />
                            @endforeach
                        </div>


                        <button class="section__nav section__nav--cards section__nav--prev" data-nav="#popular"
                            type="button"><svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.25 7.72559L16.25 7.72559" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                        <button class="section__nav section__nav--cards section__nav--next" data-nav="#popular"
                            type="button"><svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.75 7.72559L0.75 7.72559" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
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
                        <div class="section__carousel owl-carousel" id="newest">

                            @foreach ($upComingMovies['results'] as $movie)
                                @php
                                    $movieGenres = [];
                                    foreach ($movie['genre_ids'] as $genreId) {
                                        if (isset($genres[$genreId])) {
                                            $movieGenres[] = $genres[$genreId];
                                        }
                                    }
                                @endphp
                                <x-carousel-card
                                    imgSrc="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : 'default-image-path.jpg' }}"
                                    detailsUrl="movie/detail/{{ $movie['id'] }}" title="{{ $movie['title'] }}"
                                    rating="{{ $movie['vote_average'] }}"
                                    category="{{ implode(', ', $movieGenres) }}"
                                    year="{{ date('Y', strtotime($movie['release_date'])) }}" />
                            @endforeach


                        </div>

                        <button class="section__nav section__nav--cards section__nav--prev" data-nav="#newest"
                            type="button"><svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.25 7.72559L16.25 7.72559" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg></button>
                        <button class="section__nav section__nav--cards section__nav--next" data-nav="#newest"
                            type="button"><svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.75 7.72559L0.75 7.72559" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end newest -->

    <!-- footer -->
    <x-footer/>
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

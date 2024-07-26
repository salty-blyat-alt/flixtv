<!DOCTYPE html>
<html lang="en">

<head>
    {{-- tailwind cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider-radio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon-32x32.png') }}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>FlixTV – Movies & TV Shows, Online cinema HTML Template</title>
</head>


<body>
    <!-- header (relative style) -->
    <x-navbar />
    <!-- end header -->

    <!-- head -->
    <section class="section section--head" style="margin-top: 7rem">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h1 class="section__title section__title--head">Category</h1>
                </div>

                <div class="col-12 col-xl-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="index">Home</a></li>
                        <li class="breadcrumb__item"><a href="catalog">Catalog</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Category</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end head -->

    <!-- catalog -->
    <div class="catalog catalog--page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="catalog__nav">
                        <div class="catalog__select-wrap">
                            <form id="genreForm" action="{{ url('/category') }}" method="GET">
                                <!-- Ensure the form submits using GET method -->
                                <select class="catalog__select" name="genre" onchange="submit()">
                                    <option selected value="1" {{ $selectedGenre == '1' ? 'selected' : '' }}>All
                                        genres</option>
                                    <option value="28" {{ $selectedGenre == '28' ? 'selected' : '' }}>Action
                                    </option>
                                    <option value="12" {{ $selectedGenre == '12' ? 'selected' : '' }}>Adventure
                                    </option>
                                    <option value="16" {{ $selectedGenre == '16' ? 'selected' : '' }}>Animation
                                    </option>
                                    <option value="35" {{ $selectedGenre == '35' ? 'selected' : '' }}>Comedy
                                    </option>
                                    <option value="80" {{ $selectedGenre == '80' ? 'selected' : '' }}>Crime
                                    </option>
                                    <option value="99" {{ $selectedGenre == '99' ? 'selected' : '' }}>Documentary
                                    </option>
                                    <option value="18" {{ $selectedGenre == '18' ? 'selected' : '' }}>Drama
                                    </option>
                                    <option value="10751" {{ $selectedGenre == '10751' ? 'selected' : '' }}>Family
                                    </option>
                                    <option value="14" {{ $selectedGenre == '14' ? 'selected' : '' }}>Fantasy
                                    </option>
                                    <option value="36" {{ $selectedGenre == '36' ? 'selected' : '' }}>History
                                    </option>
                                    <option value="27" {{ $selectedGenre == '27' ? 'selected' : '' }}>Horror
                                    </option>
                                    <option value="10402" {{ $selectedGenre == '10402' ? 'selected' : '' }}>Music
                                    </option>
                                    <option value="9648" {{ $selectedGenre == '9648' ? 'selected' : '' }}>Mystery
                                    </option>
                                    <option value="10749" {{ $selectedGenre == '10749' ? 'selected' : '' }}>Romance
                                    </option>
                                    <option value="878" {{ $selectedGenre == '878' ? 'selected' : '' }}>Science
                                        Fiction</option>
                                    <option value="10770" {{ $selectedGenre == '10770' ? 'selected' : '' }}>TV Movie
                                    </option>
                                    <option value="53" {{ $selectedGenre == '53' ? 'selected' : '' }}>Thriller
                                    </option>
                                    <option value="10752" {{ $selectedGenre == '10752' ? 'selected' : '' }}>War
                                    </option>
                                    <option value="37" {{ $selectedGenre == '37' ? 'selected' : '' }}>Western
                                    </option>
                                </select>
                            </form>

                        </div>

                        <div class="slider-radio">
                            <input type="radio" name="grade" id="featured" checked="checked"><label
                                for="featured">Featured</label>
                            <input type="radio" name="grade" id="popular"><label for="popular">Popular</label>
                            <input type="radio" name="grade" id="newest"><label for="newest">Newest</label>
                        </div>
                    </div>

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
                    <div id="movie-container" class="row row--grid">
                        @foreach ($discoverMovies['results'] as $discoverMovie)
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                                <x-carousel-card :details-url="url('movie/detail/' . $discoverMovie['id'])" :img-src="$discoverMovie['poster_path']
                                    ? 'https://image.tmdb.org/t/p/w500' . $discoverMovie['poster_path']
                                    : 'img/card/11.png'" :rating="$discoverMovie['vote_average']" :title="$discoverMovie['title']"
                                    :year="substr($discoverMovie['release_date'], 0, 4)" :category="collect($discoverMovie['genre_ids'])
                                        ->map(function ($genre_id) use ($genres) {
                                            return $genres[$genre_id];
                                        })
                                        ->implode(', ')" />
                            </div>
                        @endforeach
                    </div>
                    <div id="loading" style="display: none;">Loading...</div>

                    <script>
                        let page = {{ $currentPage }};
                        let loading = false;
                        let selectedGenre = '{{ $selectedGenre }}';
                        let lastPage = {{ $discoverMovies['total_pages'] }};


                        function loadMovies() {
                            if (loading || page > lastPage) return;

                            loading = true;
                            document.getElementById('loading').style.display = 'block';

                            fetch(`/category?page=${page}&genre=${selectedGenre}`, {
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }})
                                .then(response => response.json())
                                .then(data => {
                                    const movieContainer = document.getElementById('movie-container');
                                    data.movies.forEach(movie => {
                                        const movieElement = document.createElement('div');
                                        movieElement.className = 'col-6 col-sm-4 col-lg-3 col-xl-2';
                                        movieElement.innerHTML = `
                                    <div class="card">
                                        <a href="movie/detail/${movie.id}" class="card__cover">
                                            <img src="${movie.poster_path
                                                ? 'https://image.tmdb.org/t/p/w500' + movie.poster_path
                                                : 'img/card/11.png'}" alt="${movie.title}">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <button class="card__add" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z" />
                                            </svg>
                                        </button>
                                        <span class="card__rating">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                            </svg>
                                            ${movie.vote_average}
                                        </span>
                                        <h3 class="card__title"><a href="movie/detail/${movie.id}">${movie.title}</a></h3>
                                        <div class="flex justify-between gap-x-4 text-white text-sm">
                                            <span>${movie.genres}</span>
                                            <span>${movie.release_date.substr(0, 4)}</span>
                                        </div>
                                    </div>
                                `;
                                        movieContainer.appendChild(movieElement);
                                    });
                                    page++;
                                    lastPage = data.lastPage;
                                    loading = false;
                                    document.getElementById('loading').style.display = 'none';
                                });
                        }

                        window.addEventListener('scroll', () => {
                            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
                                loadMovies();
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end catalog -->


    <!-- footer -->
    <x-footer/>
    <!-- end footer -->

    <!-- JS -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    <!-- Bootstrap JS (including Popper.js) -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <!-- Slider Radio JS -->
    <script src="{{ asset('js/slider-radio.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <!-- Smooth Scrollbar -->
    <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>

    <!-- Magnific Popup -->
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

    <!-- Plyr -->
    <script src="{{ asset('js/plyr.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
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
    <div class="container px-4 mx-auto">
        <h1 class="text-2xl text-white pt-32">Search Results for "{{ $searchterm }}" </h1>
        <div class="grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4" id="searchSection">
            @foreach ($combinedResults as $movie)
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

                    $movieGenres = [];
                    foreach ($movie['genre_ids'] as $genreId) {
                        if (isset($genres[$genreId])) {
                            $movieGenres[] = $genres[$genreId];
                        }
                    }

                    $title = $movie['title'] ?? ($movie['name'] ?? 'Title not available');
                    $releaseDate = $movie['release_date'] ?? ($movie['first_air_date'] ?? null);
                    $year = $releaseDate ? date('Y', strtotime($releaseDate)) : '';
                    $url = $movie['isTvShow'] ? 'tv/detail/' . $movie['id'] : 'movie/detail/' . $movie['id'];
                @endphp
                <x-carousel-card
                    imgSrc="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : 'default-image-path.jpg' }}"
                    detailsUrl="{{ $url }}" title="{{ $title }}"
                    rating="{{ $movie['vote_average'] ?? 'N/A' }}" category="{{ implode(', ', $movieGenres) }}"
                    year="{{ $year }}" />
            @endforeach

            @if (empty($combinedResults))
                <p>No results found.</p>
            @endif

        </div>
    </div>



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

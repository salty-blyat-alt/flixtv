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
    <h1>Search Results</h1>

    <!-- Movies Section -->
    <h2>Movies</h2>
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap gap-2 mx-auto" id="searchSection">
            @if (isset($result['movies']) && count($result['movies']) > 0)
                @foreach ($result['movies'] as $movie)
                    @php
                        $imageUrl = $movie['poster_path']
                            ? 'https://image.tmdb.org/t/p/original' . $movie['poster_path']
                            : asset('img/home/2.jpg');
                    @endphp

                    <x-card-home :link="'movie/detail/' . $movie['id']" :image="$imageUrl" :title="$movie['title']" />
                @endforeach
            @else
                <p>No movies found.</p>
            @endif


            @if (isset($result['tv_shows']) && count($result['tv_shows']) > 0)
                @foreach ($result['tv_shows'] as $tvShow)
                    @php
                        $imageUrl = $tvShow['poster_path']
                            ? 'https://image.tmdb.org/t/p/original' . $tvShow['poster_path']
                            : asset('img/home/2.jpg');
                    @endphp
                    <x-card-home :link="'tv/detail/' . $tvShow['id']" :image="$imageUrl" :title="$tvShow['name']" />
                @endforeach
            @else
                <p>No TV shows found.</p>
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

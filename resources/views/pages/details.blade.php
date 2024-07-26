<!DOCTYPE html>
<html lang="en">

<head>
    {{-- tailwind cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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


    <!-- details -->
    <section class="section section--head section--head-fixed section--gradient section--details-bg">
        <div class="section__bg" data-bg="img/details.jpg"></div>
        <div class="container">
            <!-- article -->
            <div class="article">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <!-- trailer -->
                        <a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="article__trailer open-video">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            Trailer
                        </a>
                        <!-- end trailer -->

                        <!-- article content -->
                        <div class="article__content">
                            <h1>
                                @if (isset($movie))
                                    {{ $movie['title'] }}
                                @elseif(isset($tvDetail))
                                    {{ $tvDetail['name'] }}
                                @endif
                            </h1>

                            <ul class="list">
                                @if (isset($movie))
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                        </svg>
                                        {{ rtrim(number_format($movie['vote_average'], 2), '0') }}
                                    </li>
                                    <li>{{ \Carbon\Carbon::parse($movie['release_date'])->year }}</li>
                                    <li>{{ $movie['runtime'] }}mn</li>
                                    <li>{{ $movie['certification'] }}</li>
                                @elseif(isset($tvDetail))
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                        </svg>
                                        {{ rtrim(number_format($tvDetail['vote_average'], 2), '0') }}
                                    </li>
                                    <li>{{ \Carbon\Carbon::parse($tvDetail['first_air_date'])->year }}</li>
                                    <li>{{ isset($tvDetail['episode_run_time'][0]) ? $tvDetail['episode_run_time'][0] . 'mn' : 'N/A' }}
                                    </li>
                                    <li>{{ $tvDetail['certification'] ?? 'N/A' }}</li>
                                @endif
                            </ul>

                            @if (isset($movie))
                                <p>{{ $movie['overview'] }}</p>
                            @elseif(isset($tvDetail))
                                <p>{{ $tvDetail['overview'] }}</p>
                            @endif

                        </div>
                        <!-- end article content -->
                    </div>

                    <!-- video player -->
                    <div class="col-12 col-xl-8">
                        <div id='videoPlayer' class="video-container mt-4"
                            style="width: 100%; max-width: 800px; position: relative;">
                            @if (isset($movie))
                                <iframe src="https://www.2embed.cc/embed/{{ $movie['id'] }}" width="100%"
                                    height="500" frameborder="0" scrolling="no" allowfullscreen
                                    style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                                </iframe>
                            @endif
                        </div>
                    </div>
                    <!-- end video player -->

                    @if (isset($tvDetail))
                        <!-- series -->
                        <div class="col-12">
                            <div class="series-wrap">
                                {{-- filter the movie by genre --}}
                                <select id='seasonSelect' class="catalog__select" name="season"
                                    onchange="handleSeason()">
                                    @foreach ($tvDetail['seasons'] as $index => $season)
                                        @if ($index > 0)
                                            <option value="{{ $index }}">Season {{ $index }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                                <div class="section__carousel-wrap">
                                    <div class="section__series grid grid-cols-4 gap-4" id="episodesContainer">
                                    </div>
                                </div>

                                {{-- <button class="section__nav section__nav--series section__nav--prev" data-nav="#series"
                                    type="button"><svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.25 7.72559L16.25 7.72559" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                                <button class="section__nav section__nav--series section__nav--next" data-nav="#series" --}}
                                    type="button"><svg width="17" height="15" viewBox="0 0 17 15"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.75 7.72559L0.75 7.72559" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                            </div>
                        </div>
                </div>
            @endisset
            <!-- end series -->

            <div class="col-12 col-xl-8">
                <!-- categories -->
                <div class="categories">
                    <h3 class="categories__title">Genres</h3>
                    @if (isset($movie))
                        @foreach ($movie['genres'] as $genre)
                            <a href="category" class="categories__item">{{ $genre['name'] }}</a>
                        @endforeach
                    @elseif(isset($tvDetail))
                        @foreach ($tvDetail['genres'] as $genre)
                            <a href="category" class="categories__item">{{ $genre['name'] }}</a>
                        @endforeach
                    @endif
                </div>
                <!-- end categories -->
            </div>
        </div>
    </div>
    <!-- end article -->
    </div>
</section>
<!-- end details -->

<!-- similar -->
<!-- footer -->
<x-footer />
<!-- end footer -->
<!-- JS -->
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/slider-radio.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/plyr.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    @isset($tvDetail['id'])
        const tvShowId = {{ $tvDetail['id'] }};
    @endisset

    const episodesContainer = document.getElementById('episodesContainer');

    function handleSeason() {
        const seasonSelect = document.getElementById('seasonSelect');

        const selectedSeason = seasonSelect.value;
        history.pushState(null, '', `/tv/detail/${tvShowId}?season=${selectedSeason}&episode=1`);

        loadEpisodes(selectedSeason);
    }



    const handleChangeEpisode = (id = 1, showId, season = 1) => {
        console.log('id', id)
        console.log('showid', showId)
        console.log('season', season)
        const url = `https://www.2embed.cc/embedtv/${showId}&s=${season}&e=${id}`;

        const videoPlayer = document.getElementById('videoPlayer');
        videoPlayer.innerHTML = '';
        videoPlayer.innerHTML = `
        <iframe src="${url}" width="100%" height="500"
            frameborder="0" scrolling="no" allowfullscreen
            style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        </iframe>`;
        loadEpisodes(season, id);
    };



    function loadEpisodes(season, selectedEpisode = 1) {
        $.ajax({
            url: `/tv/detail/${tvShowId}?season=${season}&episode=${selectedEpisode }`,
            method: 'GET',
            data: {
                season: season,
                episode: selectedEpisode
            },
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                const episodesContainer = document.getElementById('episodesContainer');
                episodesContainer.innerHTML = '';
                console.log(data.episodes['episodes'])
                data.episodes['episodes'].forEach(episode => {

                    const episodeElement = document.createElement('div');
                    episodeElement.classList.add('series');
                    // look for selected
                    if (episode.episode_number == selectedEpisode) {
                        episodeElement.classList.add('selected-episode');
                    }

                    episodeElement.innerHTML =
                        `
                            <a onclick='handleChangeEpisode(${episode.episode_number},${tvShowId},${season})' id='episode' class="series__cover">
                                <img src="${episode.still_path ? 'https://image.tmdb.org/t/p/w500' + episode.still_path : 'default.jpg'}" alt="${episode.name}">
                                <span>
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> ${episode.runtime} minutes
                                </span>
                            </a>
                            <h3 class="series__title"><a href="/tv/detail/${tvShowId}?season=${season}&episode=${episode.id}">${episode.name}</a></h3>`;

                    episodesContainer.appendChild(episodeElement);
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching season details:', textStatus, errorThrown);
                const episodesContainer = document.getElementById('episodesContainer');
                episodesContainer.innerHTML = '<p>Error loading episodes. Please try again later.</p>';
            }
        });
    }

    function handlePopState(event) {
        const urlParams = new URLSearchParams(window.location.search);
        const season = urlParams.get('season') || 1;
        const episode = urlParams.get('episode') || 1;

        if (season) {
            document.getElementById('seasonSelect').value = season;
            loadEpisodes(season, episode);
        }
    }

    // Initialize
    window.addEventListener('popstate', handlePopState);
    document.addEventListener("DOMContentLoaded", handleChangeEpisode(1, tvShowId, 1));
    handlePopState();
</script>

</body>

</html>

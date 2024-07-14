<form id="genreForm" method="GET" action="{{ url('/') }}">
    <select id='genreSelect' class="catalog__select" onchange="filterMovies()" name='genre'>
        <option value="" {{ $slot == '' ? 'selected' : '' }}>All genres</option>
        <option value="28" {{ $slot == '28' ? 'selected' : '' }}>Action</option>
        <option value="12" {{ $slot == '12' ? 'selected' : '' }}>Adventure</option>
        <option value="16" {{ $slot == '16' ? 'selected' : '' }}>Animation</option>
        <option value="35" {{ $slot == '35' ? 'selected' : '' }}>Comedy</option>
        <option value="80" {{ $slot == '80' ? 'selected' : '' }}>Crime</option>
        <option value="99" {{ $slot == '99' ? 'selected' : '' }}>Documentary</option>
        <option value="18" {{ $slot == '18' ? 'selected' : '' }}>Drama</option>
        <option value="10751" {{ $slot == '10751' ? 'selected' : '' }}>Family</option>
        <option value="14" {{ $slot == '14' ? 'selected' : '' }}>Fantasy</option>
        <option value="36" {{ $slot == '36' ? 'selected' : '' }}>History</option>
        <option value="27" {{ $slot == '27' ? 'selected' : '' }}>Horror</option>
        <option value="10402" {{ $slot == '10402' ? 'selected' : '' }}>Music</option>
        <option value="9648" {{ $slot == '9648' ? 'selected' : '' }}>Mystery</option>
        <option value="10749" {{ $slot == '10749' ? 'selected' : '' }}>Romance</option>
        <option value="878" {{ $slot == '878' ? 'selected' : '' }}>Science Fiction</option>
        <option value="10770" {{ $slot == '10770' ? 'selected' : '' }}>TV Movie</option>
        <option value="53" {{ $slot == '53' ? 'selected' : '' }}>Thriller</option>
        <option value="10752" {{ $slot == '10752' ? 'selected' : '' }}>War</option>
        <option value="37" {{ $slot == '37' ? 'selected' : '' }}>Western</option>
    </select>
</form>

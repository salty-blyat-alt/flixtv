<nav class="bg-gray-800 p-4 text-white absolute top-0 left-0 right-0 z-10">
    <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center">
        <div class="flex items-center gap-x-4 w-full lg:w-auto justify-between lg:justify-start">
            <div class="flex items-center gap-x-2">
                <button id="menuToggle" class="text-white lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <a href="/"><img src="{{ asset('img/logo.svg') }}" alt="Logo"></a>
            </div>
            <button id="searchToggle" class="lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex items-center space-x-4 flex-grow justify-center">
            <span class="font-semibold">Browse</span>
            <form id="searchForm" action="/" method="get">
                <input type="text" id="searchInput" name="searchTerm" placeholder="Enter keywords..."
                    class="px-4 py-2 rounded bg-gray-700 text-white w-96">
            </form>

        </div>
    </div>
    <div id="mobileSearch" class="mt-4 hidden">
        <form id="mobileSearchForm" action="/" method="get">
            <input type="text" id="mobileSearchInput" name="searchTerm" placeholder="Enter keywords..."
                class="w-full px-4 py-2 rounded bg-gray-700 text-white">
        </form>

    </div>

</nav>

<!-- Drawer Menu -->
<div id="drawerMenu"
    class="fixed z-20 inset-y-0 left-0 w-64 bg-gray-900 text-white transform -translate-x-full transition-transform duration-300 ease-in-out">
    <div class="p-5">
        <button id="closeMenu" class="absolute top-4 right-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <ul class="mt-8 space-y-4">
            <li><a href="#" class="block hover:text-gray-300">Home</a></li>
            <li><a href="#" class="block hover:text-gray-300">Catalog</a></li>
            <li><a href="#" class="block hover:text-gray-300">About us</a></li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchToggle = document.getElementById('searchToggle');
        const mobileSearch = document.getElementById('mobileSearch');
        const menuToggle = document.getElementById('menuToggle');
        const drawerMenu = document.getElementById('drawerMenu');
        const closeMenu = document.getElementById('closeMenu');
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');
        const mobileSearchForm = document.getElementById('mobileSearchForm');
        const mobileSearchInput = document.getElementById('mobileSearchInput');

        searchToggle.addEventListener('click', () => {
            mobileSearch.classList.toggle('hidden');
        });

        menuToggle.addEventListener('click', () => {
            drawerMenu.classList.toggle('-translate-x-full');
        });

        closeMenu.addEventListener('click', () => {
            drawerMenu.classList.add('-translate-x-full');
        });

        searchForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default form submission
            const searchTerm = encodeURIComponent(searchInput.value
                .trim()); // Trim and encode the search input
            if (searchTerm) {
                window.location.href = `/search=${searchTerm}`; // Redirect to the search URL
            }
        });

        mobileSearchForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default form submission
            const searchTerm = encodeURIComponent(mobileSearchInput.value
                .trim()); // Trim and encode the search input
            if (searchTerm) {
                window.location.href = `/search=${searchTerm}`; // Redirect to the search URL
            }
        });
    });
</script>

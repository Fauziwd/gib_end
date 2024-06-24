<nav class="bg-white border-2 border-b-gray-900 dark:border-b-white dark:text-white dark:bg-gray-600 shadow-lg fixed z-20 top-0 w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex items-center flex-shrink-0 mr-6">
            <div class="text-center">
                <button
                    class="text-gray-900 font-semibold text-xl px-5 py-2.5 mr-2 focus:outline-none">
                    <img src="{{ asset('image/sidebar.png') }}" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                    aria-controls="drawer-navigation" alt="Menu Image" class="mr-3">
                </button>
            </div>
            <a href="/" class="flex items-center text-right" data-tooltip-target="tooltip" data-tooltip-placement="top">
                {{-- <img src="{{ asset('image/paskas.jpeg') }}" class="h-8 shadow-lg rounded-full mr-3" alt="Paskas Logo" /> --}}
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Lembaga Amal System</span>
            </a>

            <div id="tooltip" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg shadow-lg opacity-0 tooltip bg-opacity-50 backdrop-blur-lg dark:bg-opacity-50 dark:bg-gray-900">
                Beras Terbaik Untuk Orang Terbaik
            </div>
        </div>

       
    </div>
</nav>

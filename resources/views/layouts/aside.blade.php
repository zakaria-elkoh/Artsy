
<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-[#111]">
        <ul class="space-y-2 font-medium">
            <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <span class="material-symbols-outlined">
                    home
                </span>
                <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
            </a>
            <li class="rounded-lg">
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        leaderboard
                    </span>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li class="rounded-lg">
                <a href="{{route('admin.dashboard.users')}}" class="{{Route::is('admin.dashboard.users') ? 'bg-gray-700' : ''}} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>
        {{-- </li> --}}
            {{-- <li class="rounded-lg>
                <a href="{{route('admin.dashboard.projects')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        menu_book
                    </span>
                    <span class="flex-1 ms-3 whitespace-nowrap">Projects</span>
                </a>
            </li> --}}
            <li class="rounded-lg">
                <a href="{{route('admin.dashboard.partners')}}" class="{{Route::is('admin.dashboard.partners') ? 'bg-gray-700' : ''}} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        category
                    </span>
                    <span class="flex-1 ms-3 whitespace-nowrap">Partners</span>
                </a>
            </li>
            <li class="rounded-lg">
                <a href="{{route('admin.dashboard.projects')}}" class="{{Route::is('admin.dashboard.projects') ? 'bg-gray-700' : ''}} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-outlined">
                        scatter_plot
                    </span>
                    <span class="flex-1 ms-3 whitespace-nowrap">Projects</span>
                </a>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 w-full group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                        </svg>
                        <span class="ms-3 whitespace-nowrap">Log out</span>
                    </button>

                </form>
                {{-- <a href="{{route('logout')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                </a> --}}
            </li>
        </ul>
    </div>
</aside>
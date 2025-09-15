<nav class="sticky top-0 z-50">
    <div class="container flex justify-between items-center">
        <div class="font-bold text-white">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 ">
            </a>
        </div>
        <!-- User Dropdown (Place in the right side of your navbar) -->
        <div class="relative">
            <!-- Dropdown Trigger Button -->
            <button id="user-dropdown-button" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom"
                class="group flex items-center space-x-2 px-3 py-2 rounded-full text-white hover:shadow-lg border-4 border-[var(--pink)]  focus:ring-[var(--pink)] focus:outline-none transition-all duration-300"
                type="button">

                <!-- User Name -->
                <span class="text-sm font-semibold hidden md:inline">{{ Auth::user()->name ?? 'Guest' }}</span>
                <!-- Chevron Icon -->
                <i
                    class="fa-solid fa-chevron-down text-xs transition-transform duration-300 group-hover:rotate-180"></i>
            </button>

            <!-- Dropdown Menu -->
            <div id="user-dropdown"
                class="z-50 hidden bg-white rounded-xl shadow-xl border border-gray-200 w-48 absolute right-0 mt-2 divide-y divide-gray-100 animate-slide-down">
                <!-- Profile Header -->
                <div class="px-4 py-3 bg-gray-50 rounded-t-xl">
                    <div class="flex items-center space-x-3">
                       
                        <div class="overflow-hidden">
                            <p class="text-sm font-bold text-[var(--dark-purple)] truncate">
                                {{ Auth::user()->name ?? 'Guest' }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email ?? 'user@example.com' }}
                            </p>
                        </div>
                    </div>
                </div>

                @if (!Auth::user())
                      <ul class="py-2 text-sm text-gray-700">
                         <li>
                            <a href="{{ route('login') }}"
                                class="flex items-center px-4 py-2 hover:bg-[var(--pink)]/10 hover:text-[var(--pink)] transition-colors duration-200">
                                <i class="fa-solid fa-user w-5 text-[var(--dark-purple)] mr-2"></i>
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                                class="flex items-center px-4 py-2 hover:bg-[var(--pink)]/10 hover:text-[var(--pink)] transition-colors duration-200">
                                <i class="fa-solid fa-user-plus w-5 text-[var(--dark-purple)] mr-2"></i>
                                Register
                            </a>
                        </li>
                      </ul>
                @else
                    <!-- Menu Items -->
                    <ul class="py-2 text-sm text-gray-700">

                        <li>
                            <a href="#"
                                class="flex items-center px-4 py-2 hover:bg-[var(--pink)]/10 hover:text-[var(--pink)] transition-colors duration-200">
                                <i class="fa-solid fa-gear w-5 text-[var(--dark-purple)] mr-2"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <div class="border-t border-gray-100 my-1"></div>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2 text-left text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                                    <i class="fa-solid fa-sign-out-alt w-5 text-red-500 mr-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</nav>
<script>
    function toggleDropdown() {
        document.getElementById('dropdown').classList.toggle('hidden');
    }
</script>

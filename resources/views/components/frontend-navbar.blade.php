<nav class="sticky top-0 z-50">
    <div class="container flex justify-between items-center">
        <div class="font-bold text-white">
            <a href="{{route('home')}}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 ">
            </a>
        </div>
        <div>
            @if (!Auth::user())
                <div class="relative text-white">
                    <button class="focus:outline-none" onclick="toggleDropdown()"><i class="fa-solid fa-user"></i></button>
                    <div id="dropdown" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg">
                        <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-200">Login</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-200">Register</a>
                    </div>
                </div>
            @else
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="text-white hover:text-[var(--pink)]">Logout</button>
                </form>
            @endif
        </div>
    </div>
</nav>
<script>
    function toggleDropdown() {
        document.getElementById('dropdown').classList.toggle('hidden');
    }
</script>

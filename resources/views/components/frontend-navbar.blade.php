<nav>
    <div class="py-16 container flex justify-between items-center">
        <div class="font-bold">
            Home
        </div>
        <div>
            @if (!Auth::user())
                <div class="text-white">
                    <a href="{{ route('login') }}">
                        <button class="rounded-xl bg-[var(--green)] px-4 py-2">Login</button>
                    </a>
                    <a href="{{ route('register') }}">
                        <button class="rounded-xl bg-red-600 px-4 py-2">Register</button>
                    </a>
                </div>
            @else
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button  class="rounded-xl bg-red-600 px-4 py-2">Logout

                    </button>
                </form>
            @endif
        </div>
        <div>
            <button class="px-4 py-2 rounded-2xl font-bold text-white bg-[var(--green)] ">
                <a href="{{ route('task.add') }}">Add Task</a>
            </button>
        </div>
    </div>
</nav>

<x-frontend-layout>
    <section>
        <div class="container text-center">
            @foreach ($tasks as $task)
                <div class="grid grid-cols-12 items-center gap-3">
                    <div class="col-span-1">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                    <div class="col-span-3">
                        <p>{{ $task->title }}</p>
                    </div>
                    <div class="col-span-3">
                        <p>{{ $task->description }}</p>
                    </div>
                    <div class="col-span-3">
                        <p>{{ $task->deadline }}</p>
                    </div>
                    <div class="col-span-2">
                        <a href="{{ route('task.update.status', $task->id) }}">
                            <button class="bg-[var(--green)] rounded-2xl px-4 py-2 text-white"><i
                                    class="fa-solid fa-check"></i></button>
                        </a>
                        <a href="{{ route('task.delete.status', $task->id) }}">
                            <button class="bg-red-500 rounded-2xl px-4 py-2 text-white"><i
                                    class="fa-solid fa-trash"></i></button>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
        </div>
    </section>
</x-frontend-layout>

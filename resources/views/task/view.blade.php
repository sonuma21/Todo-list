<x-frontend-layout>
    <section class="py-16">
        <div id="particles-js" class="absolute top-0 left-0 w-full h-full -z-10"></div>
        <div class="flex justify-center items-center pb-8">
            <h1 class="text-3xl font-bold text-[var(--dark-purple)]">COMPLETED TASKS</h1>
        </div>
        <div class="container mx-auto">
            <div class="overflow-x-auto">
                <table class="min-w-full rounded-lg shadow-lg">
                    <thead>
                        <tr class="">
                            <th class="px-4 py-2 text-left">Title</th>
                            <th class="px-4 py-2 text-left">Description</th>
                            <th class="px-4 py-2 text-left">Deadline</th>
                            <th class="px-4 py-2 text-left">Completed At</th>
                            <th class="px-4 py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="border-t border-gray-600">
                                <td class="px-4 py-2">
                                    <i class="fa-solid fa-calendar mr-2"></i>{{ $task->title }}
                                </td>
                                <td class="px-4 py-2">{{ $task->description }}</td>
                                <td class="px-4 py-2">
                                    {{ \Carbon\Carbon::parse($task->deadline)->format('y/m/d H:i') }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $task->updated_at ? \Carbon\Carbon::parse($task->updated_at)->format('y/m/d H:i') : 'N/A' }}
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <button onclick="confirmDelete('{{ route('task.delete.status', $task->id) }}')" class="text-red-500 hover:text-red-400">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
        </div>
    </section>

    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this task? This action cannot be undone.')) {
                window.location.href = url;
            }
        }
    </script>
</x-frontend-layout>

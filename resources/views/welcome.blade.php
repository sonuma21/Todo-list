<x-frontend-layout>
    <section class="bg-pink-100 min-h-screen z-10 relative">
        <div id="particles-js" class="absolute top-0 left-0 w-full h-full -z-10"></div>
        <div class="flex justify-center items-center pt-20 welcome-header container">
            <div>
                <button>
                    <a href="{{ route('task.add') }}">Add Task</a>
                </button>
            </div>
            <div>
                <button>
                    <a href="{{ route('task.index') }}">View Tasks</a>
                </button>
            </div>
        </div>
        <div class="container text-center">
            @if ($tasks->isEmpty())
                <div class="flex justify-center items-center">
                    <h1 class="text-2xl font-bold">No pending tasks</h1>

                </div>
            @else
                @foreach ($tasks as $task)
                    <div
                        class="bg-slate-100 rounded-lg px-2 py-2 bg-opacity-50 grid grid-cols-12 items-center gap-3 my-2">
                        <div class="col-span-1">
                            <i class="fa-solid fa-calendar text-[var(--pink)]"></i>
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
                        <div class="col-span-2 flex justify-around gap-8 items-center">
                            <div>
                                <a href="{{ route('task.update.status', $task->id) }}" class="complete-link">
                                    <button class="text-green-500 font-bold"><i class="fa-solid fa-check"></i></button>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('task.delete.status', $task->id) }}" class="delete-link">
                                    <button class="text-red-500 font-bold"><i class="fa-solid fa-trash"></i></button>
                                </a>
                            </div>
                        </div>
                        <!-- Simplified Dialog -->
                        <dialog id="confirm-dialog"
                            class="rounded-lg magic p-6 shadow-xl backdrop:bg-[var(--gradient)]">
                            <div class="text-center">
                                <h3 id="dialog-title" class="text-lg font-semibold text-white mb-4"></h3>
                                <p id="dialog-message" class="text-sm text-gray-400 mb-6"></p>
                                <div class="flex justify-center gap-4">
                                    <button id="dialog-confirm"
                                        class="relative px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400 overflow-hidden">
                                        Confirm

                                    </button>
                                    <button id="dialog-cancel"
                                        class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                                </div>
                            </div>
                        </dialog>


                    </div>
                @endforeach
                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>
            @endif
        </div>

    </section>


</x-frontend-layout>
<script>
    // Handle Complete Button
    document.querySelectorAll('.complete-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            showDialog(
                'Confirm Completion',
                'Are you sure you want to mark this task as completed?',
                () => {
                    window.location.href = link.href;
                },
                'bg-green-500 hover:bg-green-400'
            );
        });
    });

    // Handle Delete Button
    document.querySelectorAll('.delete-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            showDialog(
                'Confirm Deletion',
                'Are you sure you want to delete this task? This action cannot be undone.',
                () => {
                    window.location.href = link.href;
                },
                'bg-red-500 hover:bg-red-400'
            );
        });
    });

    function showDialog(title, message, onConfirm, confirmButtonClass) {
        const dialog = document.getElementById('confirm-dialog');
        const dialogTitle = document.getElementById('dialog-title');
        const dialogMessage = document.getElementById('dialog-message');
        const dialogConfirm = document.getElementById('dialog-confirm');
        const dialogCancel = document.getElementById('dialog-cancel');

        dialogTitle.textContent = title;
        dialogMessage.textContent = message;
        dialogConfirm.className = `relative px-4 py-2 text-white rounded overflow-hidden ${confirmButtonClass}`;
        dialog.showModal();

        // Liquid effect animation
        // Remove existing event listeners to prevent duplicates
        const newConfirmButton = dialogConfirm.cloneNode(true);
        dialogConfirm.parentNode.replaceChild(newConfirmButton, dialogConfirm);
        const newCancelButton = dialogCancel.cloneNode(true);
        dialogCancel.parentNode.replaceChild(newCancelButton, dialogCancel);

        // Handle Confirm button click
        newConfirmButton.addEventListener('click', () => {
            dialog.close();
            onConfirm();
        });

        // Handle Cancel button click
        newCancelButton.addEventListener('click', () => {
            dialog.close();
        });
    }
</script>

<x-frontend-layout>
    <div class="flex justify-center items-center mb-5">
        <h1 class="text-3xl font-bold">ADD A NEW TASK</h1>
    </div>
    <div class="container flex justify-center items-center ">

        <div class="bg-[var(--green)] rounded-2xl border-2 max-w-fit px-6 py-4">

            <form action="{{ route('task.add.post') }}" method="POST">
                @csrf
                <div class="flex items-center space-x-2">
                    <label for="title">Task:</label>
                    <input type="text" placeholder="Enter the task" class="w-full p-2 border rounded-md "
                        name="title">
                </div>
                <div class="flex items-center space-x-2 mt-3">
                    <label for="deadline">Deadline:</label>
                    <input type="datetime-local" class="w-full p-2" name="deadline">
                </div>
                <div>
                    <label for="description" class="flex items-center mb-1 ">Description:</label>
                    <textarea name="description" class=" px-2 py-1 border-dotted border-black border-[2px] rounded-2xl" cols="35"
                        rows="5"></textarea>
                </div>
                <div class="flex justify-center items-center pt-2">
                    <button class="px-4 py-2 rounded-full border-[1px]">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-frontend-layout>

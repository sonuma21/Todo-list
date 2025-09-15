<x-frontend-layout>
    <section class="py-16">
        <div class="flex justify-center items-center mb-5">
            <h1 class="text-3xl font-bold text-[var(--dark-purple)]">ADD A NEW TASK</h1>
        </div>
        <div class="container flex justify-center items-center">
            <div class="task-container rounded-2xl border-2 max-w-fit px-6 py-4">
                <form action="{{ route('task.add.post') }}" method="POST">
                    @csrf
                    <div class="flex items-center space-x-2">
                        <label for="title">Task:</label>
                        <input type="text" placeholder="Enter the task" class="w-full p-2 border-2 border-[var(--dark-purple)] focus:ring-2 focus:ring-[var(--pink)] focus:border-[var(--pink)] text-[var(--dark-purple)] rounded-md"
                            name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center space-x-2 mt-3">
                        <label for="deadline" class="text-[var(--dark-purple)] font-semibold">Deadline:</label>
                        <div class="relative w-full">
                            <input type="datetime-local"
                                class="w-full p-2 border-2 border-[var(--dark-purple)] rounded-md focus:ring-2 focus:ring-[var(--pink)] focus:border-[var(--pink)] text-[var(--dark-purple)] placeholder-gray-400 bg-white transition-colors duration-200"
                                name="deadline" id="deadline"
                                min="{{ \Carbon\Carbon::now('Asia/Kathmandu')->format('Y-m-d\TH:i') }}"
                                value="{{ old('deadline') }}" required>
                            @error('deadline')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="description" class="flex items-center mb-1">Description:</label>
                        <textarea name="description" class="px-2 py-1 border-dotted border-[var(--dark-purple)] border-2 focus:ring-2 focus:ring-[var(--pink)] focus:border-[var(--pink)] text-[var(--dark-purple)] rounded-2xl" cols="35"
                            rows="5">{{ old('description') }}</textarea>
                        <br>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-center items-center pt-2">
                        <button type="submit"
                            class="px-4 py-2 rounded-full border-[1px] bg-[var(--dark-purple)] text-white hover:bg-[var(--darker-purple)]">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-frontend-layout>

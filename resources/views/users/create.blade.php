<x-layout>
    <div class="flex justify-center items-center h-screen ">
        <div class="w-1/3 border shadow-xl rounded-xl p-4 text-center">
            <h1 class="text-2xl font-bold mb-4">Create New User</h1>
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block">Name:</label>
                    <input type="text" class="form-input border" id="name" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block">Email:</label>
                    <input type="email" class="form-input border" id="email" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="dob" class="block">Date of Birth:</label>
                    <input type="date" class="form-input border" id="dob" name="dob">
                </div>
                <div class="mb-4">
                    <label for="password" class="block">Password:</label>
                    <input type="password" class="form-input border" id="password" name="password" required>
                </div>
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</button>
            </form>
        </div>
    </div>
</x-layout>

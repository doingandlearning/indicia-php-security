<x-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="w-1/3 border shadow-xl rounded-xl p-4 text-center">
            <h1 class="text-2xl font-bold mb-4">Edit User</h1>
            <form method="POST" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" class="form-input p-2 mt-1 block w-full border" id="name" name="name"
                        value="{{ $user->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" class="form-input p-2 mt-1 block w-full border" id="email" name="email"
                        value="{{ $user->email }}" required>
                </div>
                <div class="mb-4">
                    <label for="dob" class="block text-gray-700">Date of Birth:</label>
                    <input type="date" class="form-input p-2 mt-1 block w-full border" id="dob" name="dob"
                        value="{{ $user->dob->format('Y-m-d') }}">
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            </form>
        </div>
    </div>
</x-layout>

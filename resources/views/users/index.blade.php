<x-layout>

    <h1 class="text-3xl font-bold mb-4">Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
    <table class="table w-full mt-4 border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Date of Birth</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                    <td class="px-4 py-2 border">{{ $user->dob }}</td>
                    <td class="px-4 py-2 border flex space-between">
                        <div class="px-4">
                            <a href="{{ route('users.show', $user) }}">View</a>
                        </div>
                        <div class="px-4">
                            <a href="{{ route('users.edit', $user) }}">Edit</a>
                        </div>
                        <div class="px-4">
                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

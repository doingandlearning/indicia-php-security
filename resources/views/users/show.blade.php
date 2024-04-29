<x-layout>
    <h1>User Details</h1>
    <div>
        <strong>Name:</strong> {{ $user->name }}<br>
        <strong>Email:</strong> {{ $user->email }}<br>
        <strong>Date of Birth:</strong> {{ $user->dob ? $user->dob->toFormattedDateString() : 'N/A' }}
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-default">Back to list</a>
</x-layout>

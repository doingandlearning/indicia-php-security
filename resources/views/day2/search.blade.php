<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

	<div class="container mx-auto p-4">
		<form action="{{ route('search') }}" method="GET" class="mb-4">
			<input type="text" name="search" placeholder="Search members" class="border border-gray-300 rounded px-4 py-2">
			<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Search</button>
		</form>

		@foreach ($members as $member)
		<div class="bg-white shadow p-4 mb-4">
			<p class="text-lg font-bold">{{ $member->name }}</p>
			<p class="text-gray-500">{{ $member->tenant_id }}</p>
			<p class="text-gray-500">{{ $member->public }}</p>
		</div>
		@endforeach
	</div>

</body>
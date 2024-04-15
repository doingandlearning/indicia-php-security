<x-shop-layout>
	<div class="container">
		<div class="flex justify-center">
			<div class="w-1/2">
				<div class="bg-white  p-6">
					<div class="text-xl font-bold mb-4">Add new item</div>
					<div class="mb-4 mx-auto">
						<div class="bg-white shadow-md rounded-lg p-6">

							<form action="{{ route('shop.index') }}" method="POST" class="">
								@csrf
								<div class="mb-4">
									<label for="name" class="block text-gray-700">Name:</label>
									<input type="text" name="name" id="name" class="form-input mt-1 block w-full border" required>
								</div>
								<div class="mb-4">
									<label for="description" class="block text-gray-700">Description:</label>
									<textarea name="description" id="description" class="form-textarea mt-1 block w-full border" required></textarea>
								</div>
								<div class="mb-4">
									<label for="price" class="block text-gray-700">Price:</label>
									<input type="number" name="price" id="price" class="form-input mt-1 block w-full border" required>
								</div>
								<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-shop-layout>
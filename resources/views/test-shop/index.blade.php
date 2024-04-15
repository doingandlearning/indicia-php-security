<x-shop-layout>
	<div class="grid grid-cols-4 gap-4">
		@foreach($items as $item)
		<a href="{{ route('shop.show', $item->id) }}" class="rounded-lg shadow-md p-4">
			<h3>{{ $item->name }}</h3>
			<p>Price: £{{ $item->price }}</p>
			<p>View Item</p>
		</a>
		@endforeach
	</div>
</x-shop-layout>
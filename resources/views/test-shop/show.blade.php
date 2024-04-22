<x-shop-layout>
    <div style="width: 250px; margin: 0 auto; text-align: center; border: 1px solid black; padding: 10px;">
        <h1>{{ $item->name }}</h1>
        <p>{!! strip_tags($item->description) !!}</p>
        <p>Price: £{{ $item->price }}</p>
        <form action="{{ route('shop.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
</x-shop-layout>

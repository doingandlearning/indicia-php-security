<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopItem;

class ShopItemController extends Controller
{
    public function index()
    {
        $items = ShopItem::all();
        return view('test-shop.index', compact('items'));
    }

    public function show(ShopItem $item)
    {
        return view('test-shop.show', compact('item'));
    }

    public function create()
    {
        return view('test-shop.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $item = new ShopItem;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->save();

        return redirect()->route('shop.index');
    }
    public function destroy(ShopItem $item)
    {
        $item->delete();
        return redirect()->route('shop.index');
    }
}

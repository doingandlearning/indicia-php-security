<x-layout>

    <head>
        <title>Shop</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    </head>
    <nav>
        <ul class="nav-menu">
            <li><a href="/shop" class="nav-link">All items</a></li>
            <li><a href="/shop/create" class="nav-link">Add new item</a></li>
        </ul>
    </nav>
    <div class="content">
        {{ $slot }}
    </div>

    <style>
        .nav-menu {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
        }

        .nav-link {
            padding: 10px;
            text-decoration: none;
        }

        .content {
            margin: 20px;
        }
    </style>
</x-layout>

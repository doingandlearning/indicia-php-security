<!DOCTYPE html>
<html>

<head>
    <title>Product Listing</title>
</head>

<body>
    <h1>Product Listing</h1>

    <h2>TV</h2>
    <p>Price: $1000</p>
    <p>Size: 50"</p>

    <form method="post">
        @csrf
        <input type="hidden" name="price" value="10">
        <input type="hidden" name="color" value="Red">
        <button type="submit">Buy</button>
    </form>
</body>

</html>

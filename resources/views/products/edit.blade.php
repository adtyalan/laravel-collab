<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ url('/products', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Name: <input type="text" name="name" value="{{ $product->name }}" required></p>
        <p>Description: <input type="text" name="description" value="{{ $product->description }}" required></p>
        <p>Price: <input type="text" name="price" value="{{ $product->price }}" required></p>
        <p>Stock: <input type="text" name="stock" value="{{ $product->stock }}" required></p>
        <button type="submit">Update</button>
    </form>

    <a href="{{ url('/products') }}">< Back</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>
</head>
<body>
    <h1>Add New Product</h1>

    <form action="{{ url('/products') }}" method="POST">
        @csrf
        <p>Name: <input type="text" name="name" required></p>
        <p>Description: <input type="text" name="description" required></p>
        <p>Price: <input type="text" name="price" required></p>
        <p>Stock: <input type="text" name="stock" required></p>
        <button type="submit">Save</button>
    </form>

    <a href="{{ url('/products') }}"> < Back</a>
</body>
</html>
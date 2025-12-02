<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Bag</title>
</head>
<body>
    <form method="POST" action="/createBagPost">
        @csrf
        <label for="brand">Bag Brand:</label>
        <input type="text" id="brand" name="brand" required>
        <br>
        <label for="color">Color:</label>
        <input type="text" id="color" name="color" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>
        <br>
        <button type="submit">Create Bag</button>

    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Add Pet</title>
</head>
<body>
<h1>Add Pet</h1>
<form action="{{ url('/pets') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="available">Available</option>
        <option value="pending">Pending</option>
        <option value="sold">Sold</option>
    </select>
    <br>
    <button type="submit">Add</button>
</form>
</body>
</html>

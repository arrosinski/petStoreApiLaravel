<!DOCTYPE html>
<html>
<head>
    <title>Edit Pet</title>
</head>
<body>
<h1>Edit Pet</h1>
<form action="{{ url('/pets/' . $pet['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $pet['name'] }}" required>
    <br>
    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="available" {{ $pet['status'] == 'available' ? 'selected' : '' }}>Available</option>
        <option value="pending" {{ $pet['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="sold" {{ $pet['status'] == 'sold' ? 'selected' : '' }}>Sold</option>
    </select>
    <br>
    <button type="submit">Update</button>
</form>
</body>
</html>

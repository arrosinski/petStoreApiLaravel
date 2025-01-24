<!DOCTYPE html>
<html>
<head>
    <title>Pets</title>
</head>
<body>
<h1>Pets</h1>
<a href="{{ url('/pets/create') }}">Add Pet</a>
<ul>
    @foreach ($pets as $pet)
        <li>
            {{ $pet['name'] ?? 'No Name' }} -
            <a href="{{ url('/pets/' . $pet['id'] . '/edit') }}">Edit</a> -
            <form action="{{ url('/pets/' . $pet['id']) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>

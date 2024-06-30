<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hello</h1>
    @if (session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>title</th>
                <th>link</th>
                <th>explanation</th>
                <th>examples</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        @foreach ($concepts as $concept)
            <tbody>
                <tr>
                    <td>{{ $concept->title }}</td>
                    <td>{{ $concept->link }}</td>
                    <td>{{ $concept->explanation }}</td>
                    <td>{{ $concept->examples }}</td>
                    <td>
                        <a href="{{ route('concept.edit', ['concept' => $concept]) }}">Edit</a>
                        <a href="{{ route('concept.show', ['concept' => $concept]) }}">Show</a>
                        <form action="{{ route('concept.destroy', ['concept' => $concept]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</body>
</html>

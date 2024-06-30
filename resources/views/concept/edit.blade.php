<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
</head>
<body>
    <h1>hello</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('concept.update', ['concept' => $concept])  }}" method="post">
        @csrf
        @method("PUT")
        <input type="text" name="title" placeholder="title" value="{{ $concept->title }}" >
        <input type="text" name="link" placeholder="link" value="{{ $concept->link }}">
        <input type="text" name="explanation" placeholder="explanation" value="{{ $concept->explanation }}">
        <input type="text" name="examples" placeholder="examples" value="{{ $concept->examples }}">
        <input type="submit" value="submit">
    </form>
    
</body>
</html>
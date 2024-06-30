<x-app-layout>
    <x-slot name="slot">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('concept.store') }}" method="POST">
            @csrf
            @method('POST')
            <input type="text" name="title" placeholder="title">
            <input type="text" name="link" placeholder="link">
            <input type="text" name="explanation" placeholder="explanation">
            <input type="text" name="examples" placeholder="examples">
            <input type="submit" value="Submit">
        </form>
    </x-slot>
</x-app-layout>

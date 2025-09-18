<x-layout>
    <div>
        <div>
            <h1>Note: {{ $note->created_at }}</h1>
            <div>
                <a href="{{ route('note.edit', $note) }}">Edit</a>
                <form action="{{ route('note.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        </div>
        <div>
            <div>
                {{ $note->note }}
            </div>
        </div>
    </div>
</x-layout>

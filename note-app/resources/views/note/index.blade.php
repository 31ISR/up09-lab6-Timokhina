<x-layout>
    <div >
        <a href="{{ route('note.create') }}" >
            New Note
        </a>
        <div >
            @foreach ($notes as $note)
                <div >
                    <div >
                        {{ Str::words($note->note, 30) }}
                    </div>
                    <div >
                        <a href="{{ route('note.show', $note) }}" >View</a>
                        <a href="{{ route('note.edit', $note) }}" >Edit</a>
                        <form action="{{ route('note.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button >Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div >
            {{ $notes->links() }}
        </div>
    </div>
</x-layout>
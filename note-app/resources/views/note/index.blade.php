<x-layout>
    <div class="main-container">
        <a href="{{ route('note.create') }}" class="new-note-btn">New Note</a>

        @foreach ($notes as $note)
            <div class="view-screen">
                <div class="note-content">{{ Str::words($note->note, 30) }}</div>
                <div class="action-group">
                    <a href="{{ route('note.show', $note) }}" class="action-btn view-btn">View</a>
                    <a href="{{ route('note.edit', $note) }}" class="action-btn edit-btn">Edit</a>
                    <form action="{{ route('note.destroy', $note) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="pagination">
            {{ $notes->links() }}
        </div>
    </div>
</x-layout>
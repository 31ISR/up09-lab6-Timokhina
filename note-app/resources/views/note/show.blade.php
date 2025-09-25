<x-layout>
    <div class="main-container">
        <div class="view-screen">
            <h1>Note: {{ $note->created_at }}</h1>
            <div class="note-content">{{ $note->note }}</div>
            <div class="action-group">
                <a href="{{ route('note.edit', $note) }}" class="action-btn edit-btn">Edit</a>
                <form action="{{ route('note.destroy', $note) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn delete-btn">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
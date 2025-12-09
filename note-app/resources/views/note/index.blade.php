<x-app-layout>

    <div class="notes-container">
    <div>
    
         <a href="{{ route('todo.index') }}" class="new-note-btn">
            Todo
        </a>
        <a href="{{ route('note.create') }}" class="new-note-btn">
            New Note
        </a>
    </div>
        
       
        <div class="notes-grid">
            @foreach ($notes as $note)
                <div class="note-card">
                    <div class="note-content">
                        {{ Str::words($note->note, 30) }}
                    </div>
                    <div class="note-actions">
                        <a href="{{ route('note.show', $note) }}">View</a>
                        <a href="{{ route('note.edit', $note) }}">Edit</a>
                        <form action="{{ route('note.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
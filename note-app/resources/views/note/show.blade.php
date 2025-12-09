<x-app-layout>

    <div class="notes-container">
        <div class="note-view-card">
            <div class="note-view-header">
                <h1 class="note-view-title">Note {{ $note->created_at->format('d.m.Y H:i') }}</h1>
                @if($note->updated_at != $note->created_at)
                    <p class="note-view-updated">Update {{ $note->updated_at->format('d.m.Y H:i') }}</p>
                @endif
            </div>

            <div class="note-view-content">
                {{ $note->note }}
            </div>

            <div class="note-view-actions">
                <a href="{{ route('note.index') }}" class="btn btn-cancel">Cancel</a>
                <a href="{{ route('note.edit', $note) }}" class="btn-edit">Edit</a>
                
                <form action="{{ route('note.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">
                    Delete                  
                    </button>
                    
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>
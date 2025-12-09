<x-app-layout>
    <div class="note-form">
        <h1>Edit your note</h1>
        <form action="{{ route('note.update', $note) }}" method="POST">
            @csrf
            @method('PUT')
            <textarea name="note" rows="10" class="note-textarea">{{ $note->note }}</textarea>
            <div class="form-actions">
                <a href="{{ route('note.index') }}" class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-submit">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
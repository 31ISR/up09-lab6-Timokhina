<x-app-layout>
    <div class="note-form">
        <h1>Create new note</h1>
        <form action="{{ route('note.store') }}" method="POST">
            @csrf
            <textarea 
                name="note" 
                rows="10" 
                placeholder="Enter your note here"
                class="note-textarea"
            ></textarea>
            <div class="form-actions">
                <a href="{{ route('note.index') }}" class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
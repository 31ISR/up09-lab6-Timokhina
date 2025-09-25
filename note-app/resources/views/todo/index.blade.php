<x-layout>
    <div class="main-container">
        <a href="{{ route('todo.create') }}" class="new-note-btn">New Task</a>
        
        @foreach ($todos as $todo)
            <div class="view-screen {{ $todo->completed ? 'completed' : '' }}">
                <h3>{{ $todo->title }}</h3>
                <div class="note-content">{{ $todo->description }}</div>
                <div class="action-group">
                    <form action="{{ route('todo.update', $todo) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="completed" value="{{ $todo->completed ? 0 : 1 }}">
                        <button type="submit" class="action-btn {{ $todo->completed ? 'incomplete-btn' : 'complete-btn' }}">
                            {{ $todo->completed ? 'Mark Incomplete' : 'Mark Complete' }}
                        </button>
                    </form>
                    <a href="{{ route('todo.edit', $todo) }}" class="action-btn edit-btn">Edit</a>
                    <form action="{{ route('todo.destroy', $todo) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        
        <div class="pagination">
            {{ $todos->links() }}
        </div>
    </div>
</x-layout>
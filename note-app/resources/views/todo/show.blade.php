<x-layout>
    <div class="main-container">
        <div class="view-screen {{ $todo->completed ? 'completed' : '' }}">
            <h1>{{ $todo->title }}</h1>
            <div class="todo$todo-meta">
                <span class="status-badge {{ $todo->completed ? 'completed' : 'pending' }}">
                    {{ $todo->completed ? 'Completed' : 'Pending' }}
                </span>
                <span class="date-created">
                    Created: {{ $todo->created_at->format('d.m.Y H:i') }}
                </span>
                @if($todo->updated_at != $todo->created_at)
                    <span class="date-updated">
                        Updated: {{ $todo->updated_at->format('d.m.Y H:i') }}
                    </span>
                @endif
            </div>
            
            <div class="todo$todo-content">
                <h3>Description:</h3>
                <p>{{ $todo->description ?? 'No description provided' }}</p>
            </div>
            
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
                
                <a href="{{ route('todo.index') }}" class="action-btn back-btn">Back to List</a>
            </div>
        </div>
    </div>
</x-layout>
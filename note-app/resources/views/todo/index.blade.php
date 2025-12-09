<x-app-layout>
    <div class="todos-container">
        <div>
            <a href="{{ route('note.index') }}" class="new-note-btn">
                Notes
            </a>
            <a href="{{ route('todo.create') }}" class="new-note-btn">
                New Todo
            </a>
        </div>
        
        <div class="todos-grid">
            @foreach ($todos as $todo)
                <div class="todo-card {{ $todo->urgent ? 'urgent' : '' }} {{ $todo->done ? 'done' : '' }}">
                    <div class="todo-content">
                        <h3>{{ $todo->name }}</h3>
                        <p>Status: {{ $todo->done ? 'Выполнено' : 'Выполняется' }}</p>
                        @if($todo->done)
                            <p>Completed: {{ $todo->dateCompleted->format('d.m.Y H:i') }}</p>
                        @endif
                    </div>
                    <div class="todo-actions">
                        <a href="{{ route('todo.show', $todo) }}">View</a>
                        <a href="{{ route('todo.edit', $todo) }}">Edit</a>
                        <form action="{{ route('todo.destroy', $todo) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $todos->links() }}
        </div>
    </div>
</x-app-layout>
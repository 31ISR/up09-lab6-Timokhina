<x-app-layout>
    <div class="todos-container">
        <div class="todo-view-card {{ $todo->urgent ? 'urgent' : '' }} {{ $todo->done ? 'done' : '' }}">
            <div class="todo-view-header">
                <h1 class="todo-view-title">{{ $todo->name }}</h1>
                <p class="todo-view-created">Created {{ $todo->created_at->format('d.m.Y H:i') }}</p>
                @if($todo->updated_at != $todo->created_at)
                    <p class="todo-view-updated">Updated {{ $todo->updated_at->format('d.m.Y H:i') }}</p>
                @endif
            </div>

            <div class="todo-view-content">
                <p><strong>Status:</strong> {{ $todo->done ? 'Done' : 'Pending' }}</p>
                <p><strong>Priority:</strong> {{ $todo->urgent ? 'Urgent' : 'Normal' }}</p>
                @if($todo->done)
                    <p><strong>Completed at:</strong> {{ $todo->dateCompleted->format('d.m.Y H:i') }}</p>
                @endif
            </div>

            <div class="todo-view-actions">
                <a href="{{ route('todo.index') }}" class="btn btn-cancel">Cancel</a>
                <a href="{{ route('todo.edit', $todo) }}" class="btn-edit">Edit</a>
                
                <form action="{{ route('todo.destroy', $todo) }}" method="POST">
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
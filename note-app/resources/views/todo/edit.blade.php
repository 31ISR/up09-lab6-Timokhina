<x-layout>
    <div class="main-container">
        <form class="edit-screen" action="{{ route('todo.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')
            <h1>Edit task</h1>
            <input type="text" name="title" value="{{ $todo->title }}" required>
            <textarea name="description">{{ $todo->description }}</textarea>
            <div class="action-group">
                <a href="{{ route('todo.index') }}" class="action-btn cancel-btn">Cancel</a>
                <button type="submit" class="action-btn submit-btn">Update Task</button>
            </div>
        </form>
    </div>
</x-layout>
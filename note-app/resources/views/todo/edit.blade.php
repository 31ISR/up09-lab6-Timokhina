<x-app-layout>
    <div class="todo-form">
        <h1>Edit your todo</h1>
        <form action="{{ route('todo.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')
            <input 
                type="text" 
                name="name" 
                value="{{ $todo->name }}"
                class="todo-input"
                required
            >
            <div class="form-checkboxes">
                <label>
                    <input type="checkbox" name="done" value="1" {{ $todo->done ? 'checked' : '' }}> Done
                </label>
                <label>
                    <input type="checkbox" name="urgent" value="1" {{ $todo->urgent ? 'checked' : '' }}> Urgent
                </label>
            </div>
            <div class="form-actions">
                <a href="{{ route('todo.index') }}" class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-submit">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
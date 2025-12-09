<x-app-layout>
    <div class="todo-form">
        <h1>Create new todo</h1>
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <input 
                type="text" 
                name="name" 
                placeholder="Enter your todo here"
                class="todo-input"
                required
            >
            <div class="form-checkboxes">
                <label>
                    <input type="checkbox" name="done" value="1"> Done
                </label>
                <label>
                    <input type="checkbox" name="urgent" value="1"> Urgent
                </label>
            </div>
            <div class="form-actions">
                <a href="{{ route('todo.index') }}" class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout> 
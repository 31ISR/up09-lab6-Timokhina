<x-layout>
    <div class="main-container">
        <form class="edit-screen" action="{{ route('todo.store') }}" method="POST">
            @csrf
            <h1>
                Create new task
            </h1>

            <input type="text" name="title" placeholder="Task title" required>

            <textarea name="description" placeholder="Task description"></textarea>

            <div class="action-group">
                <a href="{{ route('todo.index') }}" class="action-btn cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="action-btn submit-btn">
                    Create Task
                </button>
            </div>
        </form>
    </div>
</x-layout>
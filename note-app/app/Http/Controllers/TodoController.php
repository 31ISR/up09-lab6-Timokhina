<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();
        return view('todo.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:75'],
            'done' => ['sometimes', 'boolean'], // Добавляем 'sometimes'
            'urgent' => ['sometimes', 'boolean'],
        ]);
        
        // Устанавливаем значения по умолчанию, если ключи отсутствуют
        $data['done'] = $data['done'] ?? false;
        $data['urgent'] = $data['urgent'] ?? false;
        
        $data['user_id'] = $request->user()->id;
        $data['dateCompleted'] = $data['done'] ? now() : null;
        
        $todo = Todo::create($data);
        return to_route('todo.index')->with('message', 'Todo was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if ($todo->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        if ($todo->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:75',
            'done' => 'sometimes|boolean',
            'urgent' => 'sometimes|boolean',
        ]);
        
        // Устанавливаем значения по умолчанию
        $validated['done'] = $validated['done'] ?? false;
        $validated['urgent'] = $validated['urgent'] ?? false;
        
        $validated['dateCompleted'] = $validated['done'] ? now() : null;
        
        $todo->update($validated);
        return to_route('todo.index')->with('message', 'Todo was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if ($todo->user_id !== request()->user()->id) {
            abort(403);
        }
        $todo->delete();
        return to_route('todo.index')->with('message', 'Todo was deleted');
    }
}
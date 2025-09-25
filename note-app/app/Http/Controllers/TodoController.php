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
        $todos = Todo::query()->orderBy('created_at', 'desc')->paginate();
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
            'todo' => ['required', 'string']
        ]);

        $data['user_id'] = 1;
        $todo = Todo::create($data);

        return to_route('todo.show', $todo)->with('message', 'Task was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, Todo $todo)
    {
        /*if ($todo->user_id !== request()->user()->id) {
            abort(403);
        }*/
        $data = $request->validate([
            'todo' => ['required', 'string']
        ]);

        $todo->update($data);

        return to_route('todo.show', $todo)->with('message', 'Todo was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(Todo $todo)
    {
        /*if ($todo->user_id !== request()->user()->id) {
            abort(403);
        }*/
        $todo->delete();

        return to_route('$todo.index')->with('message', 'Todo was deleted');
    }
}

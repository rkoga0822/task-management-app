<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function dashboard():View
    {
        $this->authorize('admin');
        return view('admin.dashboard');
    }

    public function index(): View
    {
        $this->authorize('admin');
       $users=User::latest()->get();
       $tasks=Task::latest()->get();
        return view('admin.users.index', compact(['users','tasks']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        auth()->user()->tasks()->create(
            $request->validated()
        );
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Task $task): View
    // {
    //     $this->authorize('view', $task);
    //     return view('tasks.show', compact('task'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $this->authorize('admin');

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->validated());
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task,User $user)
    {
        $this->authorize('admin');

        $user->delete();

        return redirect()->route('users.index');
    }

    public function userlist():View
    {
        return view('admin.userlist');
    }
}

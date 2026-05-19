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

    public function dashboard(): View
    {
        $this->authorize('admin');
        return view('admin.dashboard');
    }

    public function index(): View
    {
        $this->authorize('admin');
        $users = User::latest()->get();
        $tasks = Task::latest()->get();
        return view('admin.users.index', compact(['users', 'tasks']));
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
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('admin');

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('admin');

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $user->update([
            'name' => $request->name
        ]);

        return redirect()
            ->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('admin');

        $user->tasks()->delete();

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function userlist(): View
    {
        return view('admin.userlist');
    }

    //登録ユーザーのtodo全件取得
    public function tasks(Request $request)
    {
        $this->authorize('admin');

        $userId = $request->input('user_id');

        $tasks = Task::with('user')
            ->when($userId, function ($query, $userId) {
                $query->where('user_id', $userId);
            })
            ->latest()
            ->paginate(10);

        $users = User::orderBy('name')->get();

        return view('admin.tasks.index', compact('tasks', 'users', 'userId'));
    }
}

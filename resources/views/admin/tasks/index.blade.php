<x-layouts::app :title="__('Todo全体確認')">
    <div class="p-8">
        <h1 class="text-2xl font-bold mb-6">Todo全体確認</h1>

        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}" class="rounded-lg border px-5 py-3 hover:bg-gray-100">← 管理画面へ戻る</a>
        </div>

        <form method="GET" action="{{ route('admin.tasks.index') }}" class="mb-6 flex items-center gap-3">

            <select name="user_id" class="border rounded p-2">
                <option value="">全ユーザー</option>

                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $userId == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">絞り込み</button>

        </form>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4 text-left">タイトル</th>
                        <th class="p-4 text-left">本文</th>
                        <th class="p-4 text-left">ステータス</th>
                        <th class="p-4 text-left">登録者</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tasks as $task)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4">{{ $task->title }}</td>

                        <td class="p-4">{{ $task->body }}</td>

                        <td class="p-4">
                            @if($task->status === 'todo')
                            <span class="px-3 py-1 rounded-full bg-gray-100 text-sm">{{ $task->status_label }}</span>

                            @elseif($task->status === 'doing')
                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-sm">{{ $task->status_label }}</span>

                            @elseif($task->status === 'done')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-sm">{{ $task->status_label }}</span>
                            @endif

                        </td>
                        <td class="p-4">{{ $task->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>
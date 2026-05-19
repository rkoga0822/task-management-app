<x-layouts::app :title="__('Todo一覧')">

    <div class="mx-auto max-w-5xl space-y-6">

        <!-- ヘッダー -->
        <div class="flex items-center justify-between">

            <div>
                <h1 class="text-3xl font-bold">Todo一覧</h1>

                <p class="mt-1 text-gray-500">こんにちは {{ auth()->user()->name }} さん</p>
            </div>
            <a href="{{ route('tasks.create') }}" class="rounded-xl bg-black px-5 py-3 text-black shadow hover:opacity-80">新規作成</a>
        </div>


        <!-- 絞り込み -->
        <div class="rounded-2xl border bg-white p-6 shadow-sm">

            <form method="GET" action="{{ route('tasks.index') }}" class="flex items-center gap-3">

                <select name="status" class="rounded-lg border px-4 py-2">
                    <option value="">全て</option>

                    <option value="todo" {{ request('status')=='todo' ? 'selected':'' }}>未完了</option>

                    <option value="doing" {{ request('status')=='doing' ? 'selected':'' }}>進行中</option>

                    <option value="done" {{ request('status')=='done' ? 'selected':'' }}>完了</option>
                </select>
                <button class="rounded-lg border px-5 py-2 hover:bg-gray-100">絞り込み</button>
            </form>
        </div>

        <!-- タスク一覧 -->
        <div class="space-y-4">
            @foreach($tasks as $task)
            <div class="rounded-2xl border bg-white p-6 shadow-sm">
                <div class="space-y-3">
                    <h2 class="text-2xl font-bold">{{ $task->title }}</h2>
                    <div class="space-y-1 text-gray-600">
                        <p>ステータス：{{ $task->status_label }}</p>
                        <p>期限：{{ $task->due_date }}</p>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    @can('view',$task)
                    <a href="{{ route('tasks.show',$task) }}" class="rounded-lg bg-blue-500 px-5 py-2 text-white transition hover:bg-blue-600">
                        詳細
                    </a>
                    @endcan

                    @can('delete',$task)
                    <form action="{{ route('tasks.destroy',$task) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('本当に削除しますか')" class="rounded-lg bg-red-500 px-5 py-2 text-white transition hover:bg-red-600">
                            削除
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layouts::app>
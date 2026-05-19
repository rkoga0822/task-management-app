<x-layouts::app :title="__('Todo詳細')">

    <div class="mx-auto max-w-3xl">

        <!-- タイトル -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold">タスク詳細</h1>
            <p class="mt-2 text-gray-500">タスクの詳細情報です</p>
        </div>

        <!-- カード -->
        <div class="rounded-2xl border bg-white p-8 shadow-sm">
            <!-- タイトル -->
            <div class="mb-6">
                <p class="mb-2 text-sm text-gray-500">タイトル</p>
                <p class="text-2xl font-bold">{{ $task->title }}</p>
            </div>

            <!-- 本文 -->
            <div class="mb-6">
                <p class="mb-2 text-sm text-gray-500">本文</p>

                <div class="rounded-lg bg-gray-50 p-4">
                    {{ $task->body ?: '本文なし' }}
                </div>
            </div>

            <!-- ステータス -->
            <div class="mb-6">
                <p class="mb-2 text-sm text-gray-500">ステータス</p>
                <p class="font-medium">{{ $task->status_label }}</p>
            </div>

            <!-- 期限 -->
            <div class="mb-8">
                <p class="mb-2 text-sm text-gray-500">期限</p>
                <p>{{ $task->due_date }}</p>
            </div>

            <!-- ボタン -->
            <div class="flex gap-3">
                @can('update',$task)
                <a href="{{ route('tasks.edit',$task) }}" class="rounded-lg bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">編集</a>
                @endcan

                <a href="{{ route('tasks.index') }}" class="rounded-lg border px-6 py-3 hover:bg-gray-100">一覧へ戻る</a>
            </div>
        </div>
    </div>
</x-layouts::app>
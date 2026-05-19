<x-layouts::app :title="__('タスク編集')">

    <div class="mx-auto max-w-3xl">

        <!-- タイトル -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold">タスク編集</h1>

            <p class="mt-2 text-gray-500">タスク内容を更新できます</p>
        </div>

        <!-- カード -->
        <div class="rounded-2xl border bg-white p-8 shadow-sm">

            <form action="{{ route('tasks.update',$task) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')
                <!-- タイトル -->
                <div>
                    <label class="mb-2 block text-sm font-medium">タイトル</label>

                    <input type="text" name="title" value="{{ old('title',$task->title) }}" class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 本文 -->
                <div>
                    <label class="mb-2 block text-sm font-medium">本文</label>

                    <textarea name="body" rows="5" class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('body',$task->body) }}</textarea>

                    @error('body')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ステータス -->
                <div>
                    <label class="mb-2 block text-sm font-medium">ステータス</label>

                    <select name="status" class="w-full rounded-lg border px-4 py-3">
                        <option value="todo" {{ old('status',$task->status)=='todo' ? 'selected':'' }}>未完了</option>

                        <option value="doing" {{ old('status',$task->status)=='doing' ? 'selected':'' }}>進行中</option>

                        <option value="done" {{ old('status',$task->status)=='done' ? 'selected':'' }}>完了</option>
                    </select>
                </div>

                <!-- 期限 -->
                <div>
                    <label class="mb-2 block text-sm font-medium">期限</label>
                    <input type="date" name="due_date" value="{{ old('due_date',$task->due_date) }}" class="w-full rounded-lg border px-4 py-3">
                </div>

                <!-- ボタン -->
                <div class="flex gap-3 pt-4">
                    <button type="submit" class="rounded-lg bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">
                        更新する
                    </button>

                    <a href="{{ route('tasks.show',$task) }}" class="rounded-lg border px-6 py-3 hover:bg-gray-100">戻る</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
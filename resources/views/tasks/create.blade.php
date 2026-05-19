<x-layouts::app :title="__('Todo新規作成')">

    <div class="mx-auto max-w-3xl">

        <!-- タイトル -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold">タスク新規作成</h1>
            <p class="mt-2 text-gray-500">新しいタスクを登録します</p>
        </div>


        <!-- カード -->
        <div class="rounded-2xl border bg-white p-8 shadow-sm">

            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- タイトル -->
                <div>
                    <label class="mb-2 block text-sm font-medium">タイトル</label>

                    <input type="text" name="title" value="{{ old('title') }}" placeholder="タスクタイトル" class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 本文 -->
                <div>
                    <label class="mb-2 block text-sm font-medium">本文</label>
                    <textarea name="body" rows="5" placeholder="タスク内容" class="w-full rounded-lg border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('body') }}</textarea>
                </div>

                <!-- 期限 -->
                <div>
                    <label class="mb-2 block text-sm font-medium">期限</label>

                    <input type="date" name="due_date" value="{{ old('due_date',date('Y-m-d')) }}"class="w-full rounded-lg border px-4 py-3">

                </div>

                <!-- ボタン -->
                <div class="flex gap-3 pt-4">

                    <button type="submit" class="rounded-lg bg-blue-500 px-6 py-3 text-white hover:bg-blue-600">新規作成</button>

                    <a href="{{ route('tasks.index') }}" class="rounded-lg border px-6 py-3 hover:bg-gray-100">戻る</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
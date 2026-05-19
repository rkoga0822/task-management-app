<x-layouts::app :title="__('管理者画面')">

    <div class="mx-auto max-w-6xl">

        <!-- ヘッダー -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold">管理者ダッシュボード</h1>
            <p class="mt-2 text-gray-500">この画面は管理者のみアクセスできます</p>
        </div>

        <!-- メニューカード -->
        <div class="grid gap-6 md:grid-cols-3">

            <!-- ユーザー管理 -->
            <a href="{{ route('users.index') }}" class="rounded-2xl border bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <h2 class="mb-2 text-xl font-bold">ユーザー管理</h2>
                <p class="text-sm text-gray-500">登録ユーザーの確認・編集を行います</p>
            </a>

            <!-- Todo確認 -->
            <a href="#" class="rounded-2xl border bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <h2 class="mb-2 text-xl font-bold">Todo全体確認</h2>
                <p class="text-sm text-gray-500">全ユーザーのTodoを確認します</p>
            </a>

            <!-- ログ確認 -->
            <a href="#" class="rounded-2xl border bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <h2 class="mb-2 text-xl font-bold">操作ログ確認</h2>
                <p class="text-sm text-gray-500">システム操作履歴を確認します</p>
            </a>
        </div>

        <!-- 下部ボタン -->
        <div class="mt-8">
            <a href="{{ route('tasks.index') }}" class="inline-block rounded-lg border px-6 py-3 hover:bg-gray-100">← タスク一覧へ戻る</a>
        </div>
    </div>
</x-layouts::app>
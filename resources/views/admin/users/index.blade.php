<x-layouts::app :title="__('ユーザー一覧')">
    <div class="mx-auto max-w-6xl">
        <!-- ヘッダー -->
        <div class="mb-8 flex items-center justify-between">

            <div>
                <h1 class="text-3xl font-bold">ユーザー一覧</h1>

                <p class="mt-2 text-gray-500">登録ユーザーの管理を行います</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="rounded-lg border px-5 py-3 hover:bg-gray-100">← 管理画面へ戻る</a>

        </div>

        <!-- テーブルカード -->
        <div class="overflow-hidden rounded-2xl border bg-white shadow-sm">
            <table class="w-full">
                <!-- ヘッダー -->
                <thead class="border-b bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left">名前</th>

                        <th class="px-6 py-4 text-center">編集</th>

                        <th class="px-6 py-4 text-center">削除</th>
                    </tr>
                </thead>

                <!-- ユーザー一覧 -->
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <!-- 名前 -->
                        <td class="px-6 py-5 font-medium">{{ $user->name }}</td>

                        <!-- 編集 -->
                        <td class="px-6 py-5 text-center">
                            <a href="{{ route('users.edit',$user) }}" class="rounded-lg bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">編集</a>
                        </td>

                        <!-- 削除 -->
                        <td class="px-6 py-5 text-center">
                            <form action="{{ route('users.destroy',$user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('本当に削除しますか？')" class="rounded-lg bg-red-500 px-4 py-2 text-white hover:bg-red-600">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>
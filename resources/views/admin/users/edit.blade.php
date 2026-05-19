<x-layouts::app :title="__('ユーザー編集')">

<div class="max-w-xl p-8">

    <h1 class="text-2xl font-bold mb-6">
        ユーザー編集
    </h1>

    <form
        action="{{ route('admin.users.update',$user) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label>
                名前
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name',$user->name) }}"
                class="w-full border rounded p-3">

        </div>

        <button
            class="bg-blue-500 text-white px-5 py-3 rounded">

            更新

        </button>

    </form>

</div>

</x-layouts::app>
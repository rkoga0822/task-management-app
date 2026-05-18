<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク一覧</title>
</head>

<body>
    <h1>Todo一覧</h1>
    <h2>こんにちは{{auth()->user()->name}}さん</h2>
    <a href="{{route('tasks.create')}}">新規作成</a><br>

    <!-- 絞り込み -->
    <form method="GET" action="{{ route('tasks.index') }}">

    <select name="status">
        <option value="">全て</option>

        <option value="todo" {{ request('status')=='todo' ? 'selected':'' }}>未完了</option>

        <option value="doing" {{ request('status')=='doing' ? 'selected':'' }}>進行中</option>

        <option value="done" {{ request('status')=='done' ? 'selected':'' }}>完了</option>

    </select>

    <button>絞り込み</button>

</form>

    @foreach($tasks as $task)
    <p>タイトル：{{$task->title}}</p>
    <p>ステータス：{{$task->status_label}}</p>
    <p>期限：{{$task->due_date}}</p>
    @can('view',$task)
    <a href="{{route('tasks.show',$task)}}">詳細画面</a>
    @endcan

    @can('delete',$task)
    <form action="{{route('tasks.destroy',$task)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('本当に削除しますか')">削除</button>
    </form>
    @endcan
    @endforeach

</body>

</html>
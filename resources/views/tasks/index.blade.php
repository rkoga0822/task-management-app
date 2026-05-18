<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク一覧</title>
</head>

<body>
    <h1>Todo一覧</h1>
    <a href="{{route('tasks.create')}}">新規作成</a>

    @foreach($tasks as $task)
    <p>タイトル：{{$task->title}}</p>
    <p>ステータス：{{$task->status_label}}</p>
    <p>期限：{{$task->due_date}}</p>
    <a href="{{route('tasks.show',$task)}}">詳細画面</a>
    <form action="{{route('tasks.destroy',$task)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('本当に削除しますか')">削除</button>
    </form>
    @endforeach

</body>

</html>
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
    <p>ステータス：{{$task->status}}</p>
    <p>期限：{{$task->due_date}}</p>
    <a href="{{route('tasks.show',$task)}}">詳細画面</a>
    @endforeach

</body>

</html>
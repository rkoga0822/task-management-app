<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク詳細画面</title>
</head>

<body>
    <h1>タスク詳細画面</h1>

    <p>タイトル：{{$task->title}}</p>
    <p>本文：{{$task->body}}</p>
    <p>ステータス：{{$task->status}}</p>
    <p>期限：{{$task->due_date}}</p>

    <a href="{{route('tasks.edit',$task)}}">編集</a><br>
    <a href="{{route('tasks.index')}}">一覧に戻る</a>

</body>

</html>
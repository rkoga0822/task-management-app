<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク新規作成</title>
</head>

<body>
    <h1>タスク新規作成</h1>
    <form action="{{route('tasks.store')}}" method="post">
        @csrf
        <label>タイトル:</label>
        <input type="text" name="title" placeholder="タスクタイトル"><br>
        <label>本文：</label>
        <textarea name="body" placeholder="タスク内容"></textarea><br>
        <label>期日：</label>
        <input type="date" name="due_date" value="{{ date('Y-m-d') }}"><br>
        <button type="submit">新規作成</button>
    </form>
</body>

</html>
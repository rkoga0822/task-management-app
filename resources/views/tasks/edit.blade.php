<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク編集画面</title>
</head>

<body>
    <h1>タスク編集画面</h1>
    <form action="{{route('tasks.update',$task)}}" method="post">
        @csrf
        @method('PATCH')

        <label>タイトル：</label>
        <input type="text" name="title" value="{{old('title',$task->title)}}"><br>

        <label>本文：</label>
        <textarea name="body">{{old('body',$task->body)}}</textarea><br>

        <label>ステータス：</label>
        <select name="status">
            <option value="todo" {{ old('status', $task->status) === 'todo' ? 'selected' : '' }}>未完了</option>

            <option value="doing" {{ old('status', $task->status) === 'doing' ? 'selected' : '' }}>進行中</option>

            <option value="done" {{ old('status', $task->status) === 'done' ? 'selected' : '' }}>完了</option>
        </select><br>

        <label>期限：</label>
        <input type="date" name="due_date" value="{{old('due_date',$task->due_date)}}"><br>

        <button type="submit">更新する</button>
    </form>

    <a href="{{route('tasks.show',$task)}}">詳細に戻る</a>
</body>

</html>
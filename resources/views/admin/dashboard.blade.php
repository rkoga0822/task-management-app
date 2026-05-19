<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者画面</title>
</head>
<body>
    <h1>管理画面</h1>

<p>この画面は管理者だけがアクセスできます。</p>

<ul>
    <li><a href="{{route('users.index')}}">ユーザー管理</a></li>
    <li><a href="#">Todo全体確認</a></li>
    <li><a href="#">操作ログ確認</a></li>
</ul>

<p>
    <a href="{{ route('tasks.index') }}">ダッシュボードへ戻る</a>
</p>
</body>
</html>
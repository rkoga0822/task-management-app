<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>
</head>

<body>
    <table>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>

            <td>
                <a href="{{ route('users.edit',$user) }}">
                    編集
                </a>
            </td>

            <td>
                <form action="{{ route('users.destroy',$user) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button>削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>
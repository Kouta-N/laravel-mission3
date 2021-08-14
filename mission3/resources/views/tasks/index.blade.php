<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>タスクリスト</title>
</head>
<body>
    <br>
    <div>
        <input type="radio" name="check_status" value="all" checked>すべて
        <input type="radio" name="check_status" value="doing">作業中
        <input type="radio" name="check_status" value="finish">完了
    </div>
    <br>
    <table style="text-align: left">
        <tr>
            <th>ID</th>
            <th>コメント</th>
            <th>状態</th>
        </tr>
        @foreach ($tasks as $index => $task)
            <tr>
                <th>{{ $index }}</th>
                <th>{{ $task->comment }}</th>
                <th>
                    <button>{{ $task->status }}</button>
                    <form method="POST" action="{{ route('tasks.destroy',$task->id) }}" >
                        @csrf
                        @method('DELETE')
                        <button>削除</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </table>
    <h2>新規タスクの追加</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name='comment'>
        <input type="hidden" name='button_status' value="作業中">
        <input type="submit" value="追加">
    </form>
</body>
</html>

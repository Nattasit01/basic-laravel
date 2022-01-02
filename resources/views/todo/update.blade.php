<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Todo</title>
</head>
<body>
    <h1>แก้ไขสิ่งที่ต้องทำ</h1>
    <div class="row">
        <div class="col-md-4">
            <form action="{{route('actionUpdate')}}" method="post">
                @csrf
                <p>
                    <label for="todo_text">To Do.: </label>
                    <input type="hidden" name="id" value="{{$todo->id}}" autocomplete="off" readonly>
                    <input type="text" name="todo_text" value="{{$todo->todo_txt}}" autocomplete="off">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </p>
                @error('todo_text')
                    <span style="color:red;">{{$message}}</span>
                @enderror
            </form>
        </div>
    </div>
</body>
</html>

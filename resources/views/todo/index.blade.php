<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>สิ่งที่ต้องทำ</h1>
    <div class="row">
        <div class="col-md-4">
            <form action="{{route('storeTodo')}}" method="post">
                @csrf
                <p>
                    <label for="todo_text">New To Do.: </label>
                    <input type="text" name="todo_text" id="todo_text" autocomplete="off">
                    <button type="submit" class="btn btn-primary">Add</button>
                </p>
                @if(session()->has('status'))
                    <span style="color:red;">{{session('status')}}</span>
                @else
                    @error('todo_text')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                @endif
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h1>รายการสิ่งที่ต้องทำ</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <ul>
                @foreach ($todoList AS $todo)
                    <li>{{$todo->id}} | {{$todo->todo_txt}} <a href="{{route('updateView', ['id' => $todo->id])}}">Edit</a> <a href="{{route('deleteTodo', ['id' => $todo->id])}}">delete</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>

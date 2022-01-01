<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>My To Do List</h1>
    <div class="row">
        <div class="colmd-3">
            <form action="{{route('addTodo')}}" method="post">
                @csrf
                <p>
                    <label for="todo_text">New To Do.: </label>
                    <input type="text" name="todo_text" id="todo_text" autocomplete="off">
                    <button type="submit" class="btn btn-primary">Add</button>
                </p>
                @error('todo_text')
                    <span>{{$message}}</span>
                @enderror
            </form>
        </div>
    </div>
</body>
</html>

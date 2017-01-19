
<html>
<head>
    <title> List of tasks </title>
</head>

<body>
<form method="post">
    {{ csrf_field() }}
    <input type="text" placeholder="Title of your task ..." name="title">
    <br>
    <textarea name="description" placeholder="Description of your task ..."></textarea>
    <br>
    <button type="submit">Save</button>
</form>
<br>
<table style="width: 100%" border="1">
    <tr>
        <td>Title</td>
        <td>Description</td>
        <td>Operations</td>
    </tr>
    @foreach($tasks as $task)
        <tr>
            <td>
                {{ $task->title }}
                @if($task->done_at != null)
                    (done)
                @endif
            </td>
            <td>{{ $task->description }}</td>
            <td>
                <form method="post"
                      action="/task/{{ $task->id }}/done"
                      style="display: inline-block; margin: 0;">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit">done</button>
                </form>
                <a href="/task/{{ $task->id }}/edit">edit</a>
                <form method="post"
                      action="/task/{{ $task->id }}"
                      style="display: inline-block; margin: 0;">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
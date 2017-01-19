@extends('layout.app')

@section('content')
<form method="post" action="/task/{{ $task->id }}">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <input type="text" placeholder="Title of your task ..." name="title" value="{{ $task->title }}">
    <br>
    <textarea name="description" placeholder="Description of your task ...">{{ $task->description }}</textarea>
    <br>
    <button type="submit">Update</button>
</form>
@endsection
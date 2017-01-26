@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-6">
                @include('common.error')

                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Title of your task ..." name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" placeholder="Description of your task ..." id="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>
                </form>
            </div>
            <div class="clearfix"></div>

            <table class="table table-striped table-hover" style="margin-top: 5px;">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Operations</th>
                </tr>
                @foreach($tasks as $task)
                    <tr @if($task->done_at != null) class="success" @endif>
                        <td>
                            {{ $task->title }}
                        </td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if(is_null($task->done_at))
                                <form method="post"
                                      action="/task/{{ $task->id }}/done"
                                      style="display: inline-block; margin: 0;">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button type="submit"
                                            class="btn btn-success"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            title="Done">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                </form>
                            @endif
                            <a class="btn btn-warning"
                               href="/task/{{ $task->id }}/edit"
                               data-toggle="tooltip"
                               data-placement="bottom"
                               title="Edit">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <form method="post"
                                  action="/task/{{ $task->id }}"
                                  style="display: inline-block; margin: 0;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit"
                                        class="btn btn-danger"
                                        data-toggle="tooltip"
                                        data-placement="bottom"
                                        title="Delete">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
                {{ $tasks->links() }}
    </div>
    </div>
@endsection
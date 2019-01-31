@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit task content</h1>

        <form method="POST" action="/task/{{$task->id}}">
            <input type="hidden" name="amend_content" />

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{$task->title}}" />
            </div>

            <div class="form-group">
                <label for="title">Content</label>
                <textarea name="content" class="form-control">{{$task->content}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="update" class="btn btn-primary">Update task</button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>

@stop
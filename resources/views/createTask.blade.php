@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create a New Task</h2>

        <form method="POST" action="/task">

            <div class="form-group">
                <label for ="title">Title</label>
                <input name="title" type="text" class="form-control" />
            </div>

            <div class="form-group">
                <label for ="title">Content</label>
                <textarea name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
            {{ csrf_field() }}
        </form>


    </div>
@endsection
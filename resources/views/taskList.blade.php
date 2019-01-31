@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check())
            <h2>Tasks List</h2>
            <a style="display:inline;" href="/task" class="btn btn-primary">Create a new Task</a>
            <table class="table">
                <thead><tr>
                    <th colspan="2">Tasks</th>
                </tr>
                </thead>
                <br>
                <br>
                <tbody>@foreach($user->tasks as $task)
                    <tr>
                        <td>
                            {{$task->title}}
                        </td>
                        <td>
                            <form action="/task/{{$task->id}}">
                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach</tbody>
            </table>
        @else
            <h3>You are not currently logged in. <a href="/login">login</a> or <a href="/register">register</a></h3>
        @endif

    </div>
@endsection
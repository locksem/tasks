<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;

class TasksController extends Controller
{
    /**
     * Default route
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Attempt to fetch authenticated user
        $user = Auth::user();
        return view('taskList',compact('user'));
    }

    public function add()
    {
        return view('createTask');
    }

    /**
     * Route for new task creation, send home with no further action if user not logged in
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        if(Auth::check()) {
            $entity = new Task();
            $entity->title = !empty($request->title) ? $request->title : '';
            $entity->content = !empty($request->content) ? $request->content : '';
            // Add user_id of currently authenticated user
            $entity->user_id = Auth::id();
            $entity->save();
        }
        return redirect('/');
    }

    /**
     * Route for display of 'edit task' view - authenticated users
     *
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Task $task)
    {
        if(Auth::check()) {
            if (Auth::user()->id == $task->user_id)
            {
                return view('editTask', compact('task'));
            }else {
                //todo: error feedback - user not allowed to update task not belonging to them
            }
        }
        return redirect('/');
    }

    /**
     * Route for amendments to / deletion of tasks
     *
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Task $task)
    {
        if(Auth::check()) {
            if(isset($_POST['delete'])) {
                $task->delete();
            } else if(!empty($_POST['amend_content'])) {
                $task->title = $request->title;
                $task->content = $request->content;
                $task->save();
            }
        }
        return redirect('/');
    }

}

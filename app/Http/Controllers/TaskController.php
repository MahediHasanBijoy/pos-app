<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    // function ProductPage():View{
    //     return view('pages.dashboard.product-page');
    // }



    function CreateTask(Request $request)
    {
        $user_id=$request->header('id');

        // Save To Database
        return Task::create([
            'task'=>$request->input('task'),
            'user_id'=>$user_id
        ]);
    }

    function DeleteTask(Request $request)
    {
        $user_id=$request->header('id');
        $task_id=$request->input('id');
        return Task::where('id',$task_id)->where('user_id',$user_id)->delete();

    }

    function TaskList(Request $request)
    {
        $user_id=$request->header('id');
        return Task::where('user_id',$user_id)->get();
    }

    function UpdateTask(Request $request)
    {
        $user_id=$request->header('id');
        $task_id=$request->input('id');

            return Task::where('id',$task_id)->where('user_id',$user_id)->update([
                'task'=>$request->input('task'),
            ]);
    }
}

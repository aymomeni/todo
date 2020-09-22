<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedTask;
use App\Http\Resources\CompletedTask as CompletedTaskResource;

class CompletedTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get completed tasks
        $completed = CompletedTask::orderBy('created_at', 'desc')->paginate(3);

        // Return collection of completed tasks as a resource
        return CompletedTaskResource::collection($completed);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $completed = $request->isMethod('put') ? CompletedTask::findOrFail
        ($request->completed) : new CompletedTask;

        $completed->id = $request->input('todo_id');
        $completed->title = $request->input('title');
        $completed->body = $request->input('body');
        $completed->completed = (bool)$request->input('completed');
        $completed->effort = $request->input('effort');
        $completed->priority = $request->input('priority');

        if($completed->save()) {
            return new CompletedTask($completed);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get a single a single completed task
        $completed = CompletedTask::findOrFail($id);

        // Return single a completed task
        return new CompletedTaskResource($completed);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get a single completed task
        $completed = CompletedTask::findOrFail($id);

        // delete this completed task
        if($completed->delete()) {
            return new CompletedTaskResource($completed);
        }
    }
}

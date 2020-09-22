<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Completed;
use App\Http\Resources\Completed as CompletedResource;

class CompletedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get completed tasks
        $completed = Completed::orderBy('created_at', 'desc')->paginate(3);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $completed = $request->isMethod('put') ? Completed::findOrFail
        ($request->completed) : new Completed;

        $completed->id = $request->input('todo_id');
        $completed->title = $request->input('title');
        $completed->body = $request->input('body');
        $completed->completed = (bool)$request->input('completed');
        $completed->effort = $request->input('effort');
        $completed->priority = $request->input('priority');

        if($completed->save()) {
            return new completed($completed);
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
        $completed = Completed::findOrFail($id);

        // Return single a completed task
        return new CompletedResource($completed);
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
        $completed = Completed::findOrFail($id);

        // delete this completed task
        if($completed->delete()) {
            return new CompletedResource($completed);
        }
    }
}

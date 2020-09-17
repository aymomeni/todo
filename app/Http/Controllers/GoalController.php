<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Http\Resources\Goal as GoalResource;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get goals
        $goals = Goal::orderBy('created_at', 'desc')->paginate(3);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goal = $request->isMethod('put') ? Goal::findOrFail
        ($request->goal_id) : new Goal;

        $goal->id = $request->input('todo_id');
        $goal->title = $request->input('title');
        $goal->body = $request->input('body');
        $goal->completed = (bool)$request->input('completed');
        $goal->effort = $request->input('effort');
        $goal->priority = $request->input('priority');

        if($goal->save()) {
            return new GoalResource($goal);
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
        // Get a single Goal
        $goal = Goal::findOrFail($id);

        // Return single goal as a resource
        return new GoalResource($goal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get goal
        $goal = Goal::findOrFail($id);

        if($goal->delete()) {
            return new GoalResource($goal);
        }
    }
}

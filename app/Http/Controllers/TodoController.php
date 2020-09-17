<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Todo;
use App\Http\Resources\Todo as TodoResource;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get todos
        $todos = Todo::orderBy('created_at', 'desc')->paginate(5);

        // Return collection of articles as a resource
        return TodoResource::collection($todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(Todo::updateOrCreate($todo)) {
        //     return new TodoResource($todo);
        // }

        $todo = $request->isMethod('put') ? Todo::findOrFail($request->todo_id) : new Todo;

        $todo->id = $request->input('todo_id');
        $todo->title = $request->input('title');
        $todo->body = $request->input('body');
        $todo->completed = $request->input('completed');
        $todo->effort = $request->input('effort');
        $todo->priority = $request->input('priority');

        if($todo->save()) {
            return new TodoResource($todo);
        }

        // Todo::updateOrCreate(
        //     [
        //         "title" => $todo->title,
        //         "body"=> $todo->body,
        //         "completed"=>$todo->completed,
        //         "effort"=>$todo->effort,
        //         "priority"=>$todo->priority
        //     ]
        // );

        // } 
        // catch (\Illuminate\Database\QueryException $e){
        //     $errorCode = $e->errorInfo[1];
        //     if($errorCode == 1062){
                
        //         // houston, we have a duplicate entry problem
        //         $todo->id = $request->input('todo_id');
        //         $todo->title = $request->input('title');
        //         $todo->body = $request->input('body');
        //         $todo->completed = $request->input('completed');
        //         $todo->effort = $request->input('effort');
        //         $todo->priority = $request->input('priority');
                
        //         if($todo->update()) {
        //             return new TodoResource($todo);
        //         }  
        //     } else {
        //         return $e;
        //     }
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get a single Todo
        $todo = Todo::findOrFail($id);

        // Return single todo as a resource
        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get todo
        $todo = Todo::findOrFail($id);

        if($todo->delete()) {
            return new TodoResource($todo);
        }
    }
}

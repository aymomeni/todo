<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\BookOrResource;
use App\Http\Resources\BookOrResource as BookOrResourceResource;

class BookOrResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get books or resources
        $booksOrResources = BookOrResource::orderBy('created_at', 'desc')->paginate(5);

        // Return collection of articles as a resource
        return BookOrResourceResource::collection($booksOrResources);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bookOrResource = $request->isMethod('put') ? BookOrResource::findOrFail
        ($request->bookOrResource_id) : new BookOrResource;

        $bookOrResource->id = $request->input('todo_id');
        $bookOrResource->title = $request->input('title');
        $bookOrResource->body = $request->input('body');
        $bookOrResource->completed = $request->input('completed');
        $bookOrResource->effort = $request->input('effort');
        $bookOrResource->priority = $request->input('priority');

        if($bookOrResource->save()) {
            return new BookOrResourceResource($bookOrResource);
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
        // Get a single BookOrResource
        $bookOrResource = BookOrResource::findOrFail($id);

        // Return single BookOrResource as a resource
        return new BookOrResource($bookOrResource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get bookOrResource
        $bookOrResource = BookOrResource::findOrFail($id);

        if($bookOrResource->delete()) {
            return new BookOrResourceResource($bookOrResource);
        }
    }
}

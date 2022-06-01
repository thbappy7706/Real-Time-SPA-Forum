<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplyResource;
use App\Models\Question;
use App\Models\Reply;
use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{


    public function __construct()
    {
        $this->middleware('JWT',['except'=>['index','show','customDelete']]);
    }

    public function index(Question $question): Collection
    {
        return $question->replies()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question,Request $request): \Illuminate\Http\Response
    {
        $reply = $question->replies()->create($request->all());
        if ($reply){
            return response(['reply'=> new ReplyResource($reply)], Response::HTTP_CREATED);
        }else{
            return response("Failed to create", Response::HTTP_FAILED_DEPENDENCY);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,Reply $reply)
    {
       return  $reply;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,Reply $reply)
    {
        $reply->delete();
        return response("Deleted",Response::HTTP_NO_CONTENT);
    }


    public function customDelete($id)
    {
       $reply = Reply::findOrFail($id);
       $reply->delete();
        if ($reply){
            return response('Deleted Successfully', Response::HTTP_ACCEPTED);
        }else{
            return response("Failed to create", Response::HTTP_FAILED_DEPENDENCY);
        }

    }
}

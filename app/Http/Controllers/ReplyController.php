<?php

namespace App\Http\Controllers;

use \Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Resources\ReplyResource;

use App\Model\Reply;
use App\Model\Question;


class ReplyController extends Controller
{

			public function __construct()
			{
					$this->middleware('JWT', ['except' => ['index', 'show']]);
			}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
				$reply = $question->replies()->create($request->all());
				return response(new ReplyResource($reply), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request, Reply $reply)
    {
				$reply->update($request->all());
				return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Reply $reply)
    {
				$reply->delete();
				return response(null, Response::HTTP_NO_CONTENT);
    }
}

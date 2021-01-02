<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplayResource;
use App\Model\Question;
use App\Model\Replay;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ReplayController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
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
        return ReplayResource::collection($question->replays);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question,Request $request)
    {
           $replay=$question->replays()->create($request->all());
           return response(['replay' => new ReplayResource($replay)],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,Replay $replay)
    {
        return new ReplayResource($replay);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request, Replay $replay)
    {
        $replay->update($request->all());
        return response('updated',Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,Replay $replay)
    {
         $replay->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}

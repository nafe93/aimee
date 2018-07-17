<?php

namespace App\Http\Controllers;

use App\Contracts\Interactions\CreateTopic;
use App\Contracts\Repositories\TopicRepository;
use App\Events\TopicUserRemoved;
use App\Topic;
use Illuminate\Http\Request;
use Laravel\Spark\Http\Controllers\Controller;
use Laravel\Spark\Spark;

class ContentController extends Controller
{
    /**
     * Display a listing of the topic.
     *
     * @param   Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Spark::interact(
            TopicRepository::class.'@forUser', [$request->user()]
        );
        
    }

    /**
     * Show the form for creating a new topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.content');
    }

    /**
     * Store a newly created topic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = $this->interaction($request, CreateTopic::class, [
            $request->user(), $request->all()
        ]);

    }

    /**
     * Display the specified topic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified topic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified topic in storage.
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
     * Unsubscribe from the topic.
     *
     * @param  Request  $request
     * @param  \App\Topic  $topic
     * @param  mixed  $request->user
     * @return Response
     */
    public function unsubscribe(Request $request, $id)
    {
        $topic = Topic::where('id', $id)->first();

        $topic->users()->detach($request->user()->id);

        event(new TopicUserRemoved($topic, $request->user()));
    }
}

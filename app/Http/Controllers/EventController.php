<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tag;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $events = Event::all();
        return view("admin.event", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $tags = Tag::all();
        return view("admin.create", compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->all();
        $newEvent = new Event();
        $newEvent->name = $data["name"];
        $newEvent->description = $data["description"];
        $newEvent->city = $data["city"];
        $newEvent->date = $data["date"];
        $newEvent->save();
        if($request->tags){
            $newEvent->tags()->attach($request->tags);
        }
        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view("admin.show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $tags = Tag::all();

        return view("admin.edit", compact('event', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $data = $request->all();
        $event = Event::find($id);
        $event->name = $data["name"];
        $event->description = $data["description"];
        $event->city = $data["city"];
        $event->date = $data["date"];
        $event->update();
        if($request->tags){
            $event->tags()->sync($request->tags);
        }
        return redirect()->route("admin.events.show", $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route("admin.events.index");
    }
}

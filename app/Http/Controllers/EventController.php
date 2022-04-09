<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Event;

class EventController extends Controller
{
    /****************************************************************************************************
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response([
            'events' => Event::all()
        ]);
    }


    /****************************************************************************************************
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'string|required',
            'description' => 'string|nullable'
        ]);

        $event = Event::create([
            'title'       => $request->title,
            'description' => $request->description
        ]);

        return response([
            'event' => $event
        ]);
    }


    /****************************************************************************************************
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response([
            'event' => Event::find($id)
        ]);
    }


    /****************************************************************************************************
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'string|required',
            'description' => 'string|nullable'
        ]);

        $event = Event::find($id);
        if($event) {
            $event->update([
                'title'       => $request->title,
                'description' => $request->description
            ]);
        }

        return response([
            'event' => $event
        ]);
    }


    /****************************************************************************************************
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if($event) {
            $event->delete();
        }

        return response([
            'deleted' => $event
        ]);
    }
}
